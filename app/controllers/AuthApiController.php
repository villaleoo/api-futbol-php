<?php

require_once './app/views/APIView.php';
require_once 'app/helpers/AuthHelper.php';
require_once './app/models/UsersModel.php';


class AuthApiController  {
    private $model;
    private $authHelper;
    private $view;
    

    function __construct() {
        $this->model = new UsersModel();
        $this->view= new APIView();
        $this->authHelper = new AuthHelper();
     
    }

    public function getData(){
        return json_decode($this->data);
    }

    function getToken($params = []) {
        $basic = $this->authHelper->getAuthHeaders(); // Darnos el header 'Authorization:' 'Basic: base64(usr:pass)'

        if(empty($basic)) {
            $this->view->response('No envió encabezados de autenticación.', 401);
            return;
        }

        $basic = explode(" ", $basic); // ["Basic", "base64(usr:pass)"]

        if($basic[0]!="Basic") {
            $this->view->response('Los encabezados de autenticación son incorrectos.', 401);
            return;
        }

        $userPass = base64_decode($basic[1]); // usr:pass
        $userPass = explode(":", $userPass); // ["usr", "pass"]

        $userName = $userPass[0];
        $pass = $userPass[1];

        $userData = $this->model->getUserByUserName($userName);

        $verificationPass= password_verify($pass, $userData->contrasenia);
        
        if($userName == $userData->nombre_usuario && $verificationPass) {
            $userData= ["name"=> $userData->nombre_usuario, "psw" => $pass];

            $token = $this->authHelper->createToken($userData);
            $this->view->response("Token creado correctamente: ".$token,200);

        } else {
            $this->view->response('El usuario o contraseña son incorrectos.', 401);
        }
    }
}

?>