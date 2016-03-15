<?php

// Return all articles
function getJeux() {
   $pdo = new PDO("mysql:host=localhost;dbname=ludusvisualis;","root","");
$pdo->exec('SET NAMES utf8');
    return $articles;
}