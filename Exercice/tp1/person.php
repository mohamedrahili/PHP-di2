<?php
class Personne{
    private $id;
    private $name;
    private $prename;

    public function __construct($id, $name, $prename){
        $this ->id = $id;
        $this->name = $name;
        $this->prename = $prename;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_prename(){
        return $this->prename;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_prename($prename){
        $this->prename = $prename;
    }

    public function show(){
        echo "id : " . $this->id . " name : " . $this->name . " prename : " . $this->prename;
    }

    public function full_name(){
        return $this->name . " " . $this->prename;
    }
}
