<?php 
require_once './app/views/APIView.php';
require_once './app/helpers/AuthHelper.php';

abstract class ApiController{
    private $data;
    private $authHelper;
    protected $view;
    protected $model;
    
  

    /*el sistema de token se puede reemplazar con una funcion, que llame a un helper que busque en una tabla de usuarios/tokens si el token que viene por GET esta en la tabla de tokens/usuarios validos*/
    /*cada vez que se crease un usuario consumidor de la api se le asignaria y guardaria en una tabla de usuarios un token unico */
    public function __construct($model){
        $this->view= new APIView();
        $this->authHelper= new AuthHelper();
        $this->model=$model;
        $this->data=file_get_contents("php://input");

                             
    }

    public function getData(){
        return json_decode($this->data);
    }

   
    public function getResource($params){
        $id= $params[":id"];

        $resource = $this->model->get($id);

        if(!empty($resource)){
            $this->view->response($resource,200);
        }else{
            $this->view->response(['error' => 'No existe recurso con id='.$params[':id']."."],404);
        }
        
    }

    public function deleteResource($params=[]){
        $id=$params[":id"];
        $resource= $this->model->get($id);

        if(!empty($resource)){
            $this->model->delete($id);
            $this->view->response("El recurso con id=".$id." ha sido eliminado.",200);

        }else{
            $this->view->response(['error' => 'No existe recurso con id='.$id."."],404);
        }

    }

    public function addResource(){
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response("Unauthorized",401);
            return;
        }
        $body= $this->getData();
       
        if(!empty($body)){                      /*aqui se podrian incluir validaciones adicionales a los campos que obtiene el body*/
            $id= $this->model->create($body);
            $resource=$this->model->get($id);
            $this->view->response($resource,201);
        }else{
            $this->view->response("No se pudo obtener los datos ingresados",400);
        } 
            
        

       
    }

    public function updateResource($params=[]){
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response("Unauthorized",401);
            return;
        }
          
        if(!empty($params)){
            $id=$params[":id"];
            $resource= $this->model->get($id);
        
            if(!empty($resource)){
                $body=$this->getData();        /*aqui se podrian incluir validaciones para que la data modificada contenga todos los campos */
                $this->model->update($id,$body);
                $this->view->response("Recurso con id=".$id.' modificado con exito.',200);

            }else{
                $this->view->response(['error' => 'No existe recurso con id='.$id.'.'],404);
            }
        }else{
            $this->view->response(['error' => 'Parametros de recurso invalidos'],404);
        }
            
        
       
    }


    public abstract function getAllResources();




}

?>