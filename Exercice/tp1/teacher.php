<?php
require 'person.php';
class Teacher extends Personne
{
    protected $specialite;
    protected $salary;

    public function __construct($id, $name, $prename, $specialite, $salary) {
        parent::__construct($id, $name, $prename); 
        $this->specialite = $specialite;
        $this->salary = $salary;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function show() {
        echo "ID: " . $this->get_id() . "<br>";
        echo "name: " . $this->get_name() . "<br>";
        echo "Prename: " . $this->get_prename() . "<br>";
        echo "Specialite: " . $this->getSpecialite() . "<br>";
        echo "Salary: " . $this->getSalary() . "<br>";
    }

    public function increaseSalary($salary){
        $this->salary += 100;
    }

    public function decreaseSalary($salary){
        $this->salary -= 100;
    }
}
?>