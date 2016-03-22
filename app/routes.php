
<?php
// Home page
$app->get('/', function () use ($app) {
    $games = $app['dao.game']->findAll();
    return $app['twig']->render('index.html.twig', array('games' => $games));
})->bind('home');

$app->get('/game/{id}', function ($id) use ($app) {

    $game = $app['dao.game']->find($id);

    return $app['twig']->render('game.html.twig', array('game' => $article));

})->bind('game');