<?php

$db = new PDO('mysql:host=localhost;dbname=filmoteka', 'root', ''); 

$sql = "SELECT * FROM films";
$result = $db->query($sql);

echo "<h2>Вывод записей из результата по одной: <h2>"

while( $film = $result->fetch(PDO::FETCH_ASSOC) ){
//	print_r($film);
	echo "Название фильма: " . $film['title'] . "<br>";
	echo "Жанр фильма: " . $film['genre'] . "<br>";
	echo "<br><br>";
}

echo "<hr />";

$sql = "SELECT * FROM films";
$result = $db->query($sql);
$films = $result->fetchAll(PDO::FETCH_ASSOC);

//print_r();

foreach ($films as $film) {
	echo "Название фильма: " . $film['title'] . "<br>";
	echo "Жанр фильма: " . $film['genre'] . "<br>";
	echo "<br><br>";
}

echo "<hr />";

$sql = "SELECT * FROM films";
$result = $db->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('title', $title);
$result->bindColumn('genre', $genre);

echo "<h2>Вывод записей с привязкой к переменным: <h2>"

while ( $result->fetch(PDO::FETCH_ASSOC) ){
	echo "ID: {$id} <br>";
	echo "Название: {$title} <br>";
	echo "Жанр: {$genre} <br>";
	echo "Год: {$year} <br>";
	echo "<br><br>";
}



$db = new PDO('mysql:host=localhost;mini-site', 'root', ''); 

$username = $_POST['username']; //Joker
$password = $_POST['password']; //555

//echo "<h2>Выбор данных из БД без защиты от SQL инъекции <h2>";

$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
$result = $db->query($sql);

echo "<h2>Выбор данных из БД без защиты от SQL инъекции <h2>";

//print_r( $result->fetch(PDO::FETCH_ASSOC));

if($result->rowCount() ==1 ){
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']}<br>";
	echo "Пароль пользователя: {$user['password']}<br>";
}

//echo "<h2>Выбор данных из БД c защитой от SQL инъекции РУЧНОЙ РЕЖИМ<h2>";

$username = $_POST['username']; //Joker
$password = $_POST['password']; //555

$username = htmlentities($username);   //защита от помещения в данные скриптов
$password = htmlentities($password);

$username = $db->quote( $username );
$username = strtr($username, array('_' =>'\_', '%' => '\%' ));


$password = $db->quote( $password );
$password = strtr($password, array('_' =>'\_', '%' => '\%' ));

$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
$result = $db->query($sql);

if($result->rowCount() ==1 ){
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']}<br>";
	echo "Пароль пользователя: {$user['password']}<br>";
}

// Выбор данных из БД c защитой от SQL инъекции АВТОМАТИЧЕСКИЙ РЕЖИМ

$sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";
$stmt = $db->prepare($sql);

$username = $_POST['username']; //Joker
$password = $_POST['password']; //555


$username = htmlentities($username);   //защита от помещения в данные скриптов
$password = htmlentities($password);

$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);

$stmt->execute();

// $stmt->execute(array(':username' => $username, ':password' => $password));

$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);

echo "<h2>Выбор данных из БД c защитой от SQL инъекции АВТОМАТИЧЕСКИЙ РЕЖИМ<h2>";

$stmt->fetch();
	echo "Имя пользователя: {$name}<br>";
	echo "Email пользователя: {$email}<br>";

// Выбор данных из БД c защитой от SQL инъекции АВТОМАТИЧЕСКИЙ РЕЖИМ 2-й вариант

$sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";
$stmt = $db->prepare($sql);
$username = $_POST['username']; //Joker
$password = $_POST['password']; //555


$username = htmlentities($username);   //защита от помещения в данные скриптов
$password = htmlentities($password);

$stmt->bindValue(1, $username);
$stmt->bindValue(2, $password);

$stmt->execute();
$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);

// можно делать без bindValue
$stmt->execute(array($username, $password));

echo "<h2>Выбор данных из БД c защитой от SQL инъекции АВТОМАТИЧЕСКИЙ РЕЖИМ 2-й вариант<h2>";
$stmt->fetch();
	echo "Имя пользователя: {$name}<br>";
	echo "Email пользователя: {$email}<br>";

//	Вставка данных в БД

$db = new PDO('mysql:host=localhost;mini-site', 'root', ''); 

$sql = "INSERT INTO users (name, email) VALUE (:name, :email)";
$stmt = $db->prepare($sql);
$username = "Flash";
$useremail = "flash@gmail.com";


$username = htmlentities($username);   //защита от помещения в данные скриптов
$useremail = htmlentities($useremail);

$stmt->bindValue(':name', $username);
$stmt->bindValue(':email', $useremail);

$stmt->execute();
// $stmt->execute(array(':name' => $username, ':email' => $useremail));

echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";
echo "<p>ID всавленной записи: " . $stmt->lastInsertId() . "</p>";

//	Обновление данных

$db = new PDO('mysql:host=localhost;mini-site', 'root', ''); 

$sql = "UPDATE users SET name = :name WHERE id = :id";
$stmt = $db->prepare($sql);

$username = "New_Flash";
$id = '7';
$stmt->bindValue(':name', $username);
$stmt->bindValue(':id', $id);
$stmt->execute();
echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";

//	Удаление данных

$db = new PDO('mysql:host=localhost;mini-site', 'root', ''); 

$sql = "DELETE FROM users WHERE name = :name";
$stmt = $db->prepare($sql);
$username = "New Flash";
$stmt->bindValue(':name', $username);
$stmt->execute();
echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";

