<?php
$servername = "172.17.0.2";
$username = "root";
$password = "1234";
try
{
	date_default_timezone_set("Europe/Paris");
	$db = mysqli_connect($servername, $username, $password);
  mysqli_query($db, "DROP DATABASE IF EXISTS mydb");
	mysqli_query($db, "create database mydb");
	mysqli_query($db, "use mydb");

  mysqli_query($db, "CREATE TABLE admin (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		login_r TEXT NOT NULL,
		passwd_r TEXT NOT NULL)");
  mysqli_query($db, "INSERT INTO admin (login_r, passwd_r) VALUES ('root', 'fe3da623f38c7d4c5c1df9f6811b6e2c89d89ecde40e51ced7c63e19a558f19b2143093439ad1e9e9beaa4a3f355f824d09711ad9cd962d9199ec66f6da6199d')");

  mysqli_query($db, "CREATE TABLE articles (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		nom TEXT NOT NULL,
		prix FLOAT NOT NULL,
    link TEXT NOT NULL)");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('MSI Aegis', '649.99', './images/desktop1.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('AsusPro', '3499.99', './images/desktop2.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Lenovo Legion', '1099.99', './images/desktop3.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('HP Omen', '950', './images/desktop4.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Asus Vivo', '249', './images/laptop1.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Asus E406', '329', './images/laptop2.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Asus F51', '745', './images/laptop3.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Lenovo Thinkpad', '1429', './images/laptop4.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('Toshiba Encore', '73.50', './images/tablet.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('CD1P', '101.34', './images/card1.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('CD1C', '171.95', './images/card2.png')");
  mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('CD1', '199', './images/card3.png')");

  mysqli_query($db, "CREATE TABLE cat (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		cat_name TEXT NOT NULL)");
  mysqli_query($db, "INSERT INTO cat (cat_name) VALUES ('Laptop')");
  mysqli_query($db, "INSERT INTO cat (cat_name) VALUES ('Desktop')");
  mysqli_query($db, "INSERT INTO cat (cat_name) VALUES ('Tablets')");
  mysqli_query($db, "INSERT INTO cat (cat_name) VALUES ('Cards')");

  mysqli_query($db, "CREATE TABLE articles_cat (
		art_id INT UNSIGNED NOT NULL,
		cat_id INT UNSIGNED NOT NULL)");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('1', '2')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('2', '2')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('3', '2')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('4', '2')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('5', '1')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('6', '1')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('7', '1')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('8', '1')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('9', '3')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('10', '4')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('11', '4')");
  mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('12', '4')");

  mysqli_query($db, "CREATE TABLE membres (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		login TEXT NOT NULL,
    passwd TEXT NOT NULL)");

	mysqli_query($db, "CREATE TABLE commandes (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		user INT UNSIGNED NOT NULL,
		creation INT UNSIGNED NOT NULL,
		prix FLOAT UNSIGNED NOT NULL,
		items TEXT NOT NULL)");

	header('Location: /');
}
catch (Exception $e)
{
	echo "Error\n";
}
?>
