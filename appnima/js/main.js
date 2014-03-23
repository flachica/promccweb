Appnima.key = 'NTMwMTBhMjNmODZkZTEwNzA0NTU0ODIyOlZROENldnZtZUd0ZzdJa3VFV0xvQXdua2VQRzB6TVM=';

Appnima.onError = function(error){
    console.log("CODE: ", error.code);
    console.log("TYPE: ", error.type);
    console.log("MESSAGE: ", error.message);
};

//flachica: Función javascript tipo trigger que salta al hacer login en Yii
function beforeLogin(form) {
   var session = Appnima.User.session();   
   var item = 0;
   if ( session !== null)
      item = localStorage.getItem(session.id);
   
   if (item !== 0){
      localStorage.removeItem(session.id);
      return true;
   }

   var credenciales = {};
   $.each(form.serializeArray(), function(_, kv) {
      credenciales[kv.name.replace('[','_').replace(']','')] = kv.value;
   });

   Appnima.User.login(credenciales.Account_email, credenciales.Account_password).then(function(error,result){
      if (error !== null) {
         if (error.code == 401){//Unauthorized         
            Appnima.User.signup(credenciales.Account_email, credenciales.Account_password).then(function(error,result){
               if (error !== null) {
                  return false;
               } else {
                  localStorage.setItem(result.id,JSON.stringify(result));
                  afterLoginAppnima(form);
               }
            });
         } else {
            return false;
         }
      }else{
         localStorage.setItem(result.id,JSON.stringify(result));
         afterLoginAppnima(form);
      }
   });
   return false;
};

function afterLoginAppnima(form) {
   form.submit();
}
