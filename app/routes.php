
<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LudusVisualis\Domain\User;
use LudusVisualis\Form\Type\UserType;

// Home page
$app->get('/', function () use ($app) {
    $games = $app['dao.game']->findAll();
    return $app['twig']->render('index.html.twig', array('games' => $games));
})->bind('home');

//Display a game
$app->get('/game/{id}', function ($id) use ($app) {
    
    $game = $app['dao.game']->find($id);
    return $app['twig']->render('game.html.twig', array('game' => $game));

})->bind('game');

//Display a category
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

// Signup form
$app->get('/signup', function(Request $request) use ($app) {
    $user = new User();
    $userForm = $app['form.factory']->create(new UserType(), $user);
    $userForm->handleRequest($request);
    if ($userForm->isSubmitted() && $userForm->isValid()) {
        // generate a random salt value
        $salt = substr(md5(time()), 0, 23);
        $user->setSalt($salt);
        $plainPassword = $user->getPassword();
        // find the default encoder
        $encoder = $app['security.encoder.digest'];
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());
        $user->setPassword($password); 
        $user->setRole("ROLE_USER");
        $app['dao.user']->save($user);
        $app['session']->getFlashBag()->add('success', 'The user was successfully created.');
    }
    return $app['twig']->render('signup.html.twig', array(
        'title' => 'New user',
        'userForm' => $userForm->createView()));
})->bind('signup')->method('POST|GET');
