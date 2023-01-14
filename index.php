<?php
//require 'test.php';
// require "functions.php";
$data= [
    "id" => 1,
    "title" => "Mistborn: the Final Empire",
    "author" => "Brandon Sanderson",
    "pages" => 560,
    "publisher" => "Gollancz",
    "publicationYear" => 2006,
    "image" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1284167912l/944073.jpg"
    ];

    $nData = json_encode($data);

    $test = 'hello from php';
    header("Content-Type: application/json");
    echo $nData;
//   echo $_GET["name"];

?>