<?php
  include('php-barcode.php');

class BarcodeGeneratorEAN13 extends CApplicationComponent
{
    // -------------------------------------------------- //
    //                  PROPERTIES
    // -------------------------------------------------- //

    public $fontSize = 10;   // GD1 in px ; GD2 in point
    public $marge    = 10;   // between barcode and hri in pixel
    public $x        = 100;  // barcode center
    public $y        = 25;  // barcode center
    public $height   = 50;   // barcode height in 1D ; module size in 2D
    public $width    = 2;    // barcode height in 1D ; not use in 2D
    public $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
    public $type     = 'ean13';
    
    public function init($fontSize = 10, $marge = 10, $x=100, $y=25, $height=100,$width = 2, $angle = 0, $type = 'ean13'){
        $this->fontSize = $fontSize;
        $this->marge = $marge;
        $this->x = $x;
        $this->y = $y;
        $this->height = $height;
        $this->width = $width;
        $this->angle = $angle;
        $this->type = $type;
        return $this;
    }

    public function build($text='', $format='image'){
        if (trim($text) <= ' ') 
			throw new exception('barcodeGenerator::build - must be passed text to operate');
		
        // -------------------------------------------------- //
        //            ALLOCATE GD RESSOURCE
        // -------------------------------------------------- //
        $im     = imagecreatetruecolor(200, 75);
        $color  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xFF,0xFF,0xFF);
        imagefilledrectangle($im, 0, 0, 200, 75, $white);

        // -------------------------------------------------- //
        //                      BARCODE
        // -------------------------------------------------- //
        $data = Barcode::gd($im, $color, $this->x, $this->y, $this->angle, $this->type, array('code'=>$text), $this->width, $this->height);

        // -------------------------------------------------- //
        //                        HRI
        // -------------------------------------------------- //
        if ( isset($font) ){
            $box = imagettfbbox($this->fontSize, 0, $font, $data['hri']);
            $len = $box[2] - $box[0];
            Barcode::rotate(-$len / 2, ($data['height'] / 2) + $this->fontSize + $this->marge, $this->angle, $xt, $yt);
            imagettftext($im, $this->fontSize, $this->angle, $this->x + $xt, $this->y + $yt, $color, $font, $data['hri']);
        }


        // -------------------------------------------------- //
        //                    GENERATE
        // -------------------------------------------------- //
        header('Access-Control-Allow-Origin: *');
        if ($format == 'image') {
            header('Content-type: image/gif');
            imagegif($im);
        }else if ($format == 'json') {
            header('Content-type: text/json; charset=utf-8');
            $longitud = 24;
            $filename = substr( md5(microtime()), 1, $longitud) . ".gif";
            imagegif($im, "images/$filename");
            $result = array('filename'=>$filename);
            $result['barcode'] = $text;
            echo CJSON::encode($result);
        }
        imagedestroy($im);
    }

    public function generateEAN($number){
      $code = str_pad($number, 12, '0', STR_PAD_LEFT);
      $weightflag = true;
      $sum = 0;
      // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
      // loop backwards to make the loop length-agnostic. The same basic functionality 
      // will work for codes of different lengths.
      for ($i = strlen($code) - 1; $i >= 0; $i--)
      {
        $sum += (int)$code[$i] * ($weightflag?3:1);
        $weightflag = !$weightflag;
      }
      $code .= 10 - ($sum % 10);
      return $code;
    }
}
?>
