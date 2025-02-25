<?php
require 'person.php';

class Student extends Personne {
    protected $filiere;
    protected $presence;
    public $absence = 0; 

    private static $students = []; // Static array to store all students

    public function __construct($id, $name, $prename, $filiere, $presence) {
        parent::__construct($id, $name, $prename); 
        $this->filiere = $filiere;
        $this->presence = $presence;

        // Add the student to the static array upon creation
        self::$students[] = $this;
    }

    // Getter and setter methods for filiere
    public function getFiliere() {
        return $this->filiere;
    }

    public function setFiliere($filiere) {
        $this->filiere = $filiere;
    }

    // Getter and setter methods for presence
    public function getPresence() { 
        return $this->presence;
    }

    public function setPresence($presence) { 
        $this->presence = $presence;
    }

    // Display student details
    public function show() {
        echo "ID: " . $this->get_id() . "<br>";
        echo "Name: " . $this->get_name() . "<br>";
        echo "Prename: " . $this->get_prename() . "<br>";
        echo "Filiere: " . $this->filiere . "<br>";
        echo "Absence: " . $this->absence . "<br>";
        echo "-----------------------------------------------------------<br>";
    }

    // Methods to search by ID or Name
    public function getById($id) {
        if ($this->get_id() == $id) {
            $this->show();
        } else {
            echo "Student with ID $id not found.<br>";
            echo "-----------------------------------------------------------<br>";
        }
    }

    public function getByName($name) { 
        if ($this->get_name() == $name) {
            $this->show();
        } else {
            echo "Student with name $name not found.<br>";
            echo "-----------------------------------------------------------<br>";
        }
    }

    // Methods to manage absences
    public function addAbsence() { 
        if ($this->presence === "no") {
            $this->absence += 1;
        }
    }

    public function removeAbsence() { 
        if ($this->absence > 0 && $this->presence === "yes") {
            $this->absence -= 1;
        }
    }

    // Static methods to manage the student list
    public static function addStudent($id, $name, $prename, $filiere, $presence) {
        return new self($id, $name, $prename, $filiere, $presence);
    }

    public static function getStudentById($id) {
        foreach (self::$students as $student) {
            if ($student->get_id() == $id) {
                return $student;
            }
        }
        return null;
    }

    public static function getStudentByName($name) {
        foreach (self::$students as $student) {
            if ($student->get_name() == $name) {
                return $student;
            }
        }
        return null;
    }
}

// Adding students using the static method
$student1 = Student::addStudent(1, "Mohamed", "Ouahib", "Development", "yes");
$student2 = Student::addStudent(2, "Mouad", "Bougayou", "Development", "no");
$student3 = Student::addStudent(3, "Amina", "Benali", "Marketing", "yes");

// Displaying details of each student
$student1->show();
$student2->show();
$student3->show();

// Testing static method to get student by ID
$foundStudent = Student::getStudentById(2);
if ($foundStudent) {
    $foundStudent->show();
} else {
    echo "Student with ID 2 not found.<br>";
}

$foundStudent = Student::getStudentById(4);
if ($foundStudent) {
    $foundStudent->show();
} else {
    echo "Student with ID 4 not found.<br>";
}

// Testing static method to get student by Name
echo "Searching for student with Name Mouad:<br>";
$foundStudent = Student::getStudentByName('Mouad');
if ($foundStudent) {
    $foundStudent->show();
} else {
    echo "Student with Name Mouad not found.<br>";
}
?>
