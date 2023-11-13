<?php 
require_once './app/models/Model.php';

class LeaguesModel extends Model{
    
    public function getAll(){
        $request= $this->db->prepare("SELECT * FROM ligas");
        $request->execute();
        $arrTeams=$request->fetchAll(PDO::FETCH_OBJ);
        
        return $arrTeams;
    }
    public function get($id){
        $request=$this->db->prepare("SELECT * FROM ligas WHERE id= ?");
        $request->execute([$id]);
        $league = $request->fetch(PDO::FETCH_OBJ);

        return $league;
    }

    public function getTeamsOfLeague($idLeague){
        $request= $this->db->prepare("SELECT clubes.* FROM clubes JOIN ligas ON clubes.id_liga = ligas.id WHERE ligas.id = ?");
        $request->execute([$idLeague]);
        $teams= $request->fetchAll(PDO:: FETCH_OBJ);

        return $teams;
    }
   
}

?>