
<?php
use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    $games = $app['dao.game']->findAll();
    return $app['twig']->render('index.html.twig', array('games' => $games));
})->bind('home');

$app->get('/game/{id}', function ($id) use ($app) {

    $game = $app['dao.game']->find($id);
    return $app['twig']->render('game.html.twig', array('game' => $game));

})->bind('game');

$app->get('/categorie/{categorie}', function ($categorie) use ($app) {
    $games = $app['dao.game']->findAllFromCategorie($categorie);
    return $app['twig']->render('categorie.html.twig', array('games' => $games));
})->bind('categorie');

// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));

})->bind('login');

