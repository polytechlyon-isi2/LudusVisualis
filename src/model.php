<?php

// Return all Games
function getGames() {
   $pdo = new PDO("mysql:host=localhost;dbname=ludusvisualis;","root","");
    $games = $pdo->query('select * from VideoGames order by game_id desc');
    return $games;
}