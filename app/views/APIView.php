<?php
class APIView {
    


    public function response($data, $status){
        header('Content-type: application/json');
        header('HTTP/1.1 '.$status." ".$this->_requestStatus($status));
        echo json_encode($data);
    }


    private function _requestStatus($code){
        $status=array(
            200 => 'OK',
            201 => "Resource created successfully",
            400 => "Bad request",
            403 => "Forbbiden",
            404 => "Resource not found",
            500 => "Internal server error"
        );

        return (isset($status[$code]))? $status[$code]: $status[500];

    }
}


?>