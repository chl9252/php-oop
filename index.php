<?php

echo 'Без ООП<br><br>';

$person1_name = 'Peter';
$person1_speciality = 'Programmer';
$person1_age = 25;

function person1_hello($name, $spec, $age){
	echo "Hello! My name $name. I am $spec and $age years old. <br><br>";
}

person1_hello($person1_name, $person1_speciality, $person1_age);

$person2_name = 'Jane';
$person2_speciality = 'Web-designer';
$person2_age = 23;

function person2_hello($name, $spec, $age){
	echo "Hello! My name $name. I am $spec and $age years old. <br><br>";
}

person2_hello($person2_name, $person2_speciality, $person2_age);

echo 'C ООП<br><br>';

class Person {
	public $name = "John Doe";
	public $speciality = "some spec";
	public $age = "-";
}

$person1 = new Person;
echo $person1->name;
echo '<br>';
echo $person1->speciality;
echo '<br>';
echo $person1->age;
echo '<br>----$person1->name = "Peter";-----------------<br><br>';

class PersonN {
	public $name;
	public $speciality;
	public $age;
}

$person1 = new PersonN;

$person1->name = 'Peter';
$person1->speciality = 'Programmer';
$person1->age = 25;

echo $person1->name;
echo '<br>';
echo $person1->speciality;
echo '<br>';
echo $person1->age;
echo '<br>----greeting($person2->name, $person2->speciality, $person2->age);---------------<br><br>';

class PersonN2 {
	public $name;
	public $speciality;
	public $age;
	public function greeting($name, $spec, $age){
			echo "Hello! My name $name. I am $spec and $age years old. <br><br>";
	}
}

$person2 = new PersonN2;
$person2->name = 'Peter';
$person2->speciality = 'Programmer';
$person2->age = 25;

$person2->greeting($person2->name, $person2->speciality, $person2->age);
echo '<br>-----$this->name;--------------<br><br>';

class PersonN3 {
	public $name;
	public $speciality;
	public $age;
	public function greeting(){
			echo $this->name;
			echo '<br>';
			echo $this->speciality;
			echo '<br>';
			echo $this->age;
			echo '<br>';
	}
}

$person3 = new PersonN3;
$person3->name = 'Peter';
$person3->speciality = 'Programmer';
$person3->age = 25;

$person3->greeting();
echo '<br>---Hello! My name is ". $this->name.". ----------------<br><br>';

class PersonN4 {
	public $name;
	public $speciality;
	public $age;
	public function greeting(){
		echo "Hello! My name is ". $this->name.". I am ". $this->speciality ." and ". $this->age ." years old. <br><br>";

	}
}

$person4 = new PersonN4;
$person4->name = 'Peter';
$person4->speciality = 'Programmer';
$person4->age = 25;

$person4->greeting();
echo '<br>----function __construct()---------------<br><br>';

class PersonN5 {
	public $name;
	public $speciality;
	public $age;

	public function __construct(){
		echo "New person just created<br>";
	}

	public function greeting(){
		echo "Hello! My name is ". $this->name.". I am ". $this->speciality ." and ". $this->age ." years old. <br><br>";

	}
}

$person5 = new PersonN5;
$person51 = new PersonN5;
$person52 = new PersonN5;

echo '<br>----function __construct($name,---------------<br><br>';

class PersonN6 {
	public $name;
	public $speciality;
	public $age;

	public function __construct($name, $spec, $age){
			$this->name = $name;
			$this->speciality = $spec;
			$this->age = $age;
	}

	public function greeting(){
		echo "Hello! My name is ". $this->name.". I am ". $this->speciality ." and ". $this->age ." years old. <br><br>";

	}
}

$person6 = new PersonN6('Peter', 'Programmer', 25);
echo $person6->name;
			echo '<br>';
			$person6->greeting();
			echo '<br>';

$person61 = new PersonN6('Jane', 'Web-designer', 23);
echo $person61->name;
			echo '<br>';
			$person61->greeting();
			echo '<br>';
