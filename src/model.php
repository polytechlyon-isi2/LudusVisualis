<?php

// Return all articles
function getJeux() {
   $pdo = new PDO("mysql:host=localhost;dbname=ludusvisualis;","root","");
    $jeux = $pdo->query('select * from VideoGames order by game_id desc');
    return $jeux;
}