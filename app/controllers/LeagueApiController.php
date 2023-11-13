<?php
require_once './app/controllers/ApiController.php';
require_once './app/models/LeaguesModel.php';

class LeagueApiController extends ApiController{

    public function __construct(){
        parent::__construct(new LeaguesModel());
      
    }


    public function getAllResources(){
        $resources= $this->model->getAll();
        $this->view->response($resources, 200);
    }
    
    public function getResource($params){
        $id= $params[":id"];
        $resource = $this->model->get($id);

        if(!empty($resource)){
            if(isset($params[":subr"]) && $params[":subr"] == 'clubes'){
                $teamsOfLeague=$this->model->getTeamsOfLeague($id);
                $resource = $teamsOfLeague;
                
            }else{
                $teamsOfLeague=$this->model->getTeamsOfLeague($id);
                $resource = array("liga" => $resource, "clubes" => $teamsOfLeague);
            }
       
            $this->view->response($resource,200);

        }else{
            $this->view->response(['error' => 'No existe recurso con id='.$params[':id']."."],404);
        }
        
    }
}


?>