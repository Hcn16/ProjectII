<?php
class Controller{ 
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model; 
    }

    public function view($view, $data = []){
        require_once "./mvc/views/".$view.".php";
    }

    public function sub_view($view, $data = []){
        require_once "./mvc/views/pages/".$view.".php";
    }

    public function GetData($data =[]){
        
    }
}
?>