<?php
require_once './app/models/Model.php';

class UsersModel extends Model{

    function getUserByUserName($userName){
        $request= $this->db->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
        $request->execute([$userName]);
        $user = $request->fetch(PDO::FETCH_OBJ);

        return $user;
    }

}

?>