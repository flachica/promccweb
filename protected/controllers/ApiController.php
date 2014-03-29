<?php
/**
 * ApiController class file
 * @author Joachim Werner <joachim.werner@diggin-data.de>  
 * Contribuye @FernandoLaChica para paginar resultados
 * Es necesario añadir el parámetro pageSizeJSON que indica el número de registros por página. Hacerlo en el config/main.php
 * También se añadirá al mismo fichero el parámetro modelJSONAvailables. Serán los modelos accesibles a través de JSON
 * Si se incluye en la URL de la petición el parámetro pageidx indicará la página de resultados, si no, se mostrará todo
 */

/**
 * ApiController 
 * 
 * @uses Controller
 * @author Joachim Werner <joachim.werner@diggin-data.de>
 * @author 
 * @see http://www.gen-x-design.com/archives/making-restful-requests-in-php/
 * @license (tbd)
 */

Yii::import('ext.barcodegenerator.*');

class ApiController extends CController
{
    // {{{ *** Members ***
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'FLACHICA';

    public function actionCanjear(){
        $result = array("status"=>"KO");
        $ofertaID = $this->getParam("ofertaID");
        $email = $this->getParam("email");
        $codigobarras = 0;
        if (   (strlen($ofertaID)>0) && 
               (strlen($email)>0)
           ){
            $model = Oferta::model()->findByPk($ofertaID);
            if (isset($model->attributes['numcanjeos'])){           
                if($model->attributes['numcanjeos']>0){
                    $model->numcanjeos -= 1;
                    $model->save();
                    $codigobarras = $this->guardaCanjeo();
                }else{
                    $result['status'] = 'KO';
                    $result['message'] = 'Número de canjeos superado';
                    $this->_sendResponse(200, CJSON::encode($result));
                }
            }else{
                $codigobarras = $this->guardaCanjeo(); 
            }
            $result = array("status"=>"OK");
        } else {
            $result['status'] = 'KO';
            $result['message'] = 'Revise si ha enviado los parámetros ofertaID y email';
            $this->_sendResponse(200, CJSON::encode($result));
        }
        
        $bc = new BarcodeGeneratorEAN13;
		$bc->init();
		$bc->build($codigobarras,'json');
    }

    public function guardaCanjeo() {
        $ofertaID = $this->getParam("ofertaID");
        $canjeo = new Canjeo;
        $canjeo->idoferta = $ofertaID;
        $canjeo->email = $this->getParam('email');

        $date = new DateTime();
        $canjeo->fecha = $date->format('d/m/Y H:i:s');
        
        $row = Yii::app()->db
                      ->createCommand("SELECT max(substring(codigo,1,12)) as maxcodigo FROM canjeo")
                      ->queryRow();
        $maxCodigo = 0;
        if (array_key_exists('maxcodigo',$row))
            $maxCodigo = $row['maxcodigo'];
        if(!isset($maxCodigo))
            $maxCodigo = 0;

        $canjeo->codigo = BarcodeGeneratorEAN13::generateEAN($maxCodigo + 1);
        $canjeo->save();
        return $canjeo->codigo;
    }

    function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {
                $position[$key]  = $row[$field];
                $newRow[$key] = $row;
        }
        if ($inverse) {
            arsort($position);
        }
        else {
            asort($position);
        }
        $returnArray = array();
        foreach ($position as $key => $pos) {     
            $returnArray[] = $newRow[$key];
        }
        return $returnArray;
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit = 'K') {
      if ($lat1 == '' || $lat2 == '')
            return 0;

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
            return $miles;
          }
    }

    private function getParam($paramName) {
        $value = '';        
        if (array_key_exists ( $paramName , $_GET ))
            $value = $_GET[$paramName];
        
        if (array_key_exists ( $paramName , $_POST ))
            $value = $_POST[$paramName];

        return $value;
    }

    private $format = 'json';
    // }}} 
    // {{{ filters
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    } // }}} 
    // {{{ *** Actions ***
    // {{{ actionIndex
    public function actionIndex()
    {
        echo CJSON::encode(array("Webservice funcionando correctamente"));
    } // }}} 
    // {{{ actionList
    public function actionList()
    {
        $this->_checkAuth();
        
        $model = CActiveRecord::model($this->getParam('model'));

        $criteria = new CDbCriteria();
        if ($this->getParam('model') == "Tienda"){
            $ccID = $this->getParam('ccID');
            if ($ccID != '')
                $criteria->addCondition('idcentrocomercial = ' . $ccID);
        } else if ($this->getParam('model') == "Oferta"){
            $tdID = $this->getParam('tdID');
            if ($tdID != '' && $tdID != '-1')
                $criteria->addCondition('idtienda = ' . $tdID);
            $ofertaID = $this->getParam('ofertaID');
            if ($ofertaID != '')
                $criteria->addCondition('idoferta = ' . $ofertaID);
            
            $criteria->addCondition('coalesce(numcanjeos,1) > 0 ' . $ofertaID);
            $criteria->addCondition("str_to_date(fechadesde, '%d/%m/%Y %H:%i:%s') <= now()");
            $criteria->addCondition("str_to_date(fechahasta, '%d/%m/%Y %H:%i:%s') >= now()");
        }

        if (array_key_exists ( 'pageidx' , $_GET ) || array_key_exists ( 'pageidx' , $_POST )) {
            $count=$model->count($criteria);
            $pages=new CPagination($count);
            $size = Yii::app()->params['pageSizeJSON'];
            $pageidx = $this->getParam('pageidx');
            
            // results per page
            $pages->pageSize=$size;
            $pages->currentPage = $pageidx;
            $pages->applyLimit($criteria);
        }

        $models = $model->findAll($criteria);

        if(is_null($models)) {
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $this->getParam('model')) );
        } else {
            $rows = array();
            foreach($models as $model) {
                $rows[] = $model->attributes;
                $rows[count($rows)-1]['curLat'] = $this->getParam('curLat');
                $rows[count($rows)-1]['curLon'] = $this->getParam('curLon');
                if (($this->getParam('model') == "Centrocomercial") || ($this->getParam('model') == "Tienda")){
                    $rows[count($rows)-1]['distancia'] = 
                            $this->distance(
                                $rows[count($rows)-1]['latitud'],
                                $rows[count($rows)-1]['longitud'],
                                $this->getParam('curLat'),
                                $this->getParam('curLon')
                            );
                }else if ($this->getParam('model') == "Oferta") {
                    $date = DateTime::createFromFormat("d/m/Y H:i:s", $rows[count($rows)-1]['fechahasta']);
                    $diff = $date->getTimestamp() - DateTime::createFromFormat("d/m/Y H:i:s",date("d/m/Y H:i:s"))->getTimestamp();
                    $rows[count($rows)-1]['segundosRestantes'] = $diff;
                }
            }
            if (($this->getParam('model') == "Centrocomercial") || ($this->getParam('model') == "Tienda"))
                 $rows = $this->orderMultiDimensionalArray($rows,"distancia",false);
            if (($this->getParam('model') == "Oferta"))
                 $rows = $this->orderMultiDimensionalArray($rows,"idtienda",false);
            $this->_sendResponse(200, CJSON::encode($rows));
        }
    } // }}} 
    // {{{ actionView
    /* Shows a single item
     * 
     * @access public
     * @return void
     */
    public function actionView()
    {
        $this->_checkAuth();
        // Check if id was submitted via GET
        if(!isset($_GET['id']))
            $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );

        switch($_GET['model'])
        {
            // Find respective model    
            case 'posts': // {{{ 
                $model = Post::model()->findByPk($_GET['id']);
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                exit; // }}} 
        }
        if(is_null($model)) {
            $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
        } else {
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes));
        }
    } // }}} 
    // {{{ actionCreate
    /**
     * Creates a new item
     * 
     * @access public
     * @return void
     */
    public function actionCreate()
    {
        $this->_checkAuth();

        switch($_GET['model'])
        {
            // Get an instance of the respective model
            case 'posts': // {{{ 
                $model = new Post;                    
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                exit; // }}} 
        }
        // Try to assign POST values to attributes
        foreach($_POST as $var=>$value) {
            // Does the model have this attribute?
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
                // No, raise an error
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            }
        }
        // Try to save the model
        if($model->save()) {
            // Saving was OK
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }

        var_dump($_REQUEST);
    } // }}}     
    // {{{ actionUpdate
    /**
     * Update a single iten
     * 
     * @access public
     * @return void
     */
    public function actionUpdate()
    {
        $this->_checkAuth();

        // Get PUT parameters
        parse_str(file_get_contents('php://input'), $put_vars);

        switch($_GET['model'])
        {
            // Find respective model
            case 'posts': // {{{ 
                $model = Post::model()->findByPk($_GET['id']);                    
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Error: Mode <b>update</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                exit; // }}} 
        }
        if(is_null($model))
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        
        // Try to assign PUT parameters to attributes
        foreach($put_vars as $var=>$value) {
            // Does model have this attribute?
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
                // No, raise error
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            }
        }
        // Try to save the model
        if($model->save()) {
            $this->_sendResponse(200, sprintf('The model <b>%s</b> with id <b>%s</b> has been updated.', $_GET['model'], $_GET['id']) );
        } else {
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't update model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
    } // }}} 
    // {{{ actionDelete
    /**
     * Deletes a single item
     * 
     * @access public
     * @return void
     */
    public function actionDelete()
    {
        $this->_checkAuth();

        switch($_GET['model'])
        {
            // Load the respective model
            case 'posts': // {{{ 
                $model = Post::model()->findByPk($_GET['id']);                    
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Error: Mode <b>delete</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                exit; // }}} 
        }
        // Was a model found?
        if(is_null($model)) {
            // No, raise an error
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        }

        // Delete the model
        $num = $model->delete();
        if($num>0)
            $this->_sendResponse(200, sprintf("Model <b>%s</b> with ID <b>%s</b> has been deleted.",$_GET['model'], $_GET['id']) );
        else
            $this->_sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
    } // }}} 
    // }}} End Actions
    // {{{ Other Methods
    // {{{ _sendResponse
    
    /**
     * Sends the API response 
     * 
     * @param int $status 
     * @param string $body 
     * @param string $content_type 
     * @access private
     * @return void
     */
    private function _sendResponse($status = 200, $body = '', $content_type = 'text/json; charset=utf-8')
    {
        //flachica: Permitir que de un explorador se pueda pedir datos no alojados en el mismo servidor donde está la página. Servicio externo.
        header('Access-Control-Allow-Origin: *');

        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        // set the status
        header($status_header);
        // set the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if($body != '')
        {
            // send the body
            echo $body;
            exit;
        }
        // we need to create the body if none is passed
        else
        {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templatized in a real-world solution
            $body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';

            echo $body;
            exit;
        }
    } // }}}            
    // {{{ _getStatusCodeMessage
    /**
     * Gets the message for a status code
     * 
     * @param mixed $status 
     * @access private
     * @return string
     */
    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    } // }}} 

    private function validateParams() {
        if (!(array_key_exists ( 'model' , $_GET ) || array_key_exists ( 'model' , $_POST )))
            $this->_sendResponse(501, 'Debe especificar el parámetro model');

        if (array_key_exists ( 'model' , $_GET ))
            $model = $_GET['model'];
        
        if (array_key_exists ( 'model' , $_POST ))
            $model = $_POST['model'];

        $availableModels = Yii::app()->params['modelJSONAvailables'];
        if (!in_array ( $model , $availableModels))
            $this->_sendResponse(469, 'El modelo especificado no es público');
    }

    // {{{ _checkAuth
    /**
     * Checks if a request is authorized
     * 
     * @access private
     * @return void
     */
    private function _checkAuth()
    {   
        $this->validateParams();        
        return true;
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if(!(isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME']) and isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME'];
        $password = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD'];
        // Find the user
        $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        if($user===null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if(!$user->validatePassword($password)) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
        }
    } // }}} 
    // {{{ _getObjectEncoded
    /**
     * Returns the json or xml encoded array
     * 
     * @param mixed $model 
     * @param mixed $array Data to be encoded
     * @access private
     * @return void
     */
    private function _getObjectEncoded($model, $array)
    {
        if(isset($_GET['format']))
            $this->format = $_GET['format'];

        if($this->format=='json')
        {
            return CJSON::encode($array);
        }
        elseif($this->format=='xml')
        {
            $result = '<?xml version="1.0">';
            $result .= "\n<$model>\n";
            foreach($array as $key=>$value)
                $result .= "    <$key>".utf8_encode($value)."</$key>\n"; 
            $result .= '</'.$model.'>';
            return $result;
        }
        else
        {
            return;
        }
    } // }}} 
    // }}} End Other Methods
}

/* vim:set ai sw=4 sts=4 et fdm=marker fdc=4: */
?>
