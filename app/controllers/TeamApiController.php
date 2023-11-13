<?php
require_once './app/models/TeamsModel.php';
require_once './app/controllers/ApiController.php';


class TeamApiController extends ApiController{
    private $columnsOrder;

    public function __construct(){
        parent::__construct(new TeamsModel());
        $this->columnsOrder=["goles_en_liga", "goles_en_copa", "cant_partidos_jugados"];
    }


    public function getAllResources(){
        $resources=[];
        if(isset($_GET["sort"]) && !empty($_GET["sort"]) && isset($_GET["order"]) && !empty($_GET["order"])){
            $filter=array("sort" => $_GET["sort"], "order" => $_GET["order"]);
            $resources= $this->getAllByOrder($filter);

        }elseif (isset($_GET["minGolesEnLiga"]) && !empty($_GET["minGolesEnLiga"])) {
            $min = intval($_GET["minGolesEnLiga"]);
            $resources = $this->model->getAllMinGoalsLeague($min);
        }else{
            $resources=$this->model->getAll();
        }

        $this->view->response($resources, 200);
    } 


    public function getAllByOrder($dataFilter){
        $resources=[];

        if(in_array($dataFilter["sort"], $this->columnsOrder)){
            if($dataFilter["order"] == "asc"){
                $resources=$this->model->getAllOrderASC($dataFilter["sort"]);
            }else{
                $resources=$this->model->getAllOrderDESC($dataFilter["sort"]);
            }  
        }else{
            $resources= $this->model->getAll();
        }
        return $resources;
    }


    
}
?>