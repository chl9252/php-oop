<?php

require "db.php";

$course = R::dispense('courses');
$course->title = "Курс по верстке";
$course->tuts = 10;
$course->homework = 8;
$course->level = "для новичков";
R::store($course);

$course = R::dispense('courses');
$course->title = "Курс по React";
$course->tuts = 10;
$course->homework = 8;
$course->level = "для новичков";
$course->price = 100;
R::store($course);

//	Вывод записей из БД

$courses = R::find('courses');
//print_r($courses);
foreach ($courses as $course) {
	echo "ID: " . $course->id . "<br>";
	echo "Название: " . $course->title . "<br>";
	echo "Кол-во уроков: " . $course->tuts . "<br>";
	echo "Уровень: " . $course->level . "<br>";
	echo "<hr>";
}

//  Обновление записи в БД

$course = R::load('curses', 4);
//print_r($course);
	echo "ID: " . $course->id . "<br>";
	echo "Название: " . $course->title . "<br>";
	echo "Кол-во уроков: " . $course->tuts . "<br>";
	echo "Уровень: " . $course->level . "<br>";
	echo "Цена: " . $course->price . "<br>";
	echo "<hr>";

$course->title = "React - ступень 1-я";
$course->tuts = 20;
$course->price = 80;
$course->students = 100;

R::store($course);

//	Удаление записи в БД

$course = R::load('curses', 2);
R::trash($course);




