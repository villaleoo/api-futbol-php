<?php
require_once './app/models/Model.php';
class TeamsModel extends Model{
    
    public function getAll(){
        $request= $this->db->prepare("SELECT * FROM clubes ");
        $request->execute();
        $arrTeams=$request->fetchAll(PDO::FETCH_OBJ);
        
        return $arrTeams;
    }

    public function get($id){
        $request=$this->db->prepare("SELECT * FROM clubes WHERE id= ?");
        $request->execute([$id]);
        $team = $request->fetch(PDO::FETCH_OBJ);

        return $team;
    }

    public function delete($id){
        $request=$this->db->prepare("DELETE FROM clubes WHERE id = ?");
        $request->execute([$id]);
    }

    public function create($data){
        $nombre= $data->nombre;
        $ciudad= $data->ciudad;
        $id_liga=$data->id_liga;
        $nombre_estadio= $data->nombre_estadio;
        $capacidad_estadio=$data->capacidad_estadio;
        $descripcion_historia=$data->descripcion_historia;
        $apodo= $data->apodo;
        $fecha_fundacion= date("Y-m-d", strtotime($data->fecha_fundacion));
        $imagen_logo= null;
        $temporada_analisis= $data->temporada_analisis;
        $cant_partidos_jugados=$data->cant_partidos_jugados;
        $goles_en_liga= $data->goles_en_liga;
        $goles_en_copa= $data->goles_en_copa;
        $promedio_edad_equipo=$data->promedio_edad_equipo;
        $cantidad_jugadores=$data->cantidad_jugadores;
        $imagen_estadio= null;
        $entidad= "club";


        $request=$this->db->prepare("INSERT INTO clubes (
            `nombre`,
            `ciudad`,
            `id_liga`,
            `nombre_estadio`,
            `capacidad_estadio`,
            `descripcion_historia`,
            `apodo`,
            `fecha_fundacion`,
            `imagen_logo`,
            `temporada_analisis`,
            `cant_partidos_jugados`,
            `goles_en_liga`,
            `goles_en_copa`,
            `promedio_edad_equipo`,
            `cantidad_jugadores`,
            `imagen_estadio`,
            `entidad`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     
             $request->execute([$nombre,
             $ciudad,
             $id_liga,
             $nombre_estadio,
             $capacidad_estadio,
             $descripcion_historia,
             $apodo,
             $fecha_fundacion,
             $imagen_logo,
             $temporada_analisis,
             $cant_partidos_jugados,
             $goles_en_liga,
             $goles_en_copa,
             $promedio_edad_equipo,
             $cantidad_jugadores,
             $imagen_estadio,
             $entidad]);
        
        return $this->db->lastInsertId();
     
    }

    public function update($id,$data){
        
        $request= $this->db->prepare("UPDATE clubes SET nombre= ?, 
        ciudad =?,
        id_liga =?,
        nombre_estadio=?,
        capacidad_estadio=?,
        descripcion_historia=?,
        apodo=?,
        fecha_fundacion=?,
        imagen_logo=?,
        temporada_analisis=?,
        cant_partidos_jugados=?,
        goles_en_liga=?,
        goles_en_copa=?,
        promedio_edad_equipo=?,
        cantidad_jugadores=?,
        imagen_estadio=? WHERE id = ?");

        $request->execute([$data->nombre, 
         $data->ciudad,
         $data->id_liga,
         $data->nombre_estadio,
         $data->capacidad_estadio,
         $data->descripcion_historia,
         $data->apodo,
         date("Y-m-d", strtotime($data->fecha_fundacion)),
         null,
         $data->temporada_analisis,
         $data->cant_partidos_jugados,
         $data->goles_en_liga,
         $data->goles_en_copa,
         $data->promedio_edad_equipo,
         $data->cantidad_jugadores,
         null,
         $id]);

    }

    public function getAllOrderASC($columnFilter){
     
        $request= $this->db->prepare("SELECT * FROM clubes ORDER BY ".$columnFilter." ASC");
        $request->execute();
        $arrTeams=$request->fetchAll(PDO::FETCH_OBJ);

        return $arrTeams;
    }

    public function getAllOrderDESC($columnFilter){
        $request= $this->db->prepare("SELECT * FROM clubes ORDER BY ".$columnFilter." DESC");
        $request->execute();
        $arrTeams=$request->fetchAll(PDO::FETCH_OBJ);

        return $arrTeams;
    }

    public function getAllMinGoalsLeague($min){
        $request= $this->db->prepare("SELECT * FROM clubes WHERE goles_en_liga > ?");
        $request->execute([$min]);
        $arrTeams=$request->fetchAll(PDO::FETCH_OBJ);

        return $arrTeams;
    }

}


?>