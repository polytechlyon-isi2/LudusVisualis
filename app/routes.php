
<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LudusVisualis\Domain\User;
use LudusVisualis\Domain\Basket;
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

// Show informations about user
$app->get('/user', function(Request $request) use ($app) {
    return $app['twig']->render('update_user.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('user_update');

// Update user informations
$app->get('/userUpdate', function(Request $request) use ($app) {
    return $app['twig']->render('edit_profile.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('profile_update');

//Display the basket of the current user
$app->get('/basket', function () use ($app) {
    $user = $app['user'];
    $orders = $app['dao.basket']->findAllByUser($user->getId());
    return $app['twig']->render('basket.html.twig', array(
        'orders' => $orders,
        /*'sum' => $sum*/));
})->bind('basket');

// add Game to basket
$app->match('/basket/{id}/add', function($id,Request $request) use ($app) {
    if($app['dao.basket']->existBasket($id,$app['user']->getId())){
        $app['dao.basket']->upBasket($id,$app['user']->getId());
    }
    else{
        $productBasket = new Basket();
        $productBasket->setUserId($app['user']->getId());
        $productBasket->setGameId($id);
        $productBasket->setQuantity("1");
        $app['dao.basket']->save($productBasket);
    }
        $app['session']->getFlashBag()->add('success', 'Le produit a bien été ajouté au panier.');
    
       
    // Redirect to product page
    $game = $app['dao.game']->find($id);
    return $app['twig']->render('game.html.twig', array('game' => $game));
})->bind('add_product_basket');

//Delete an order
$app->get('/basket/{id}', function ($id) use ($app) {
    $app['dao.basket']->deleteOrder($id); 
    $user = $app['user'];
    $orders = $app['dao.basket']->findAllByUser($user->getId());
     $app['session']->getFlashBag()->add('success', 'Le produit a bien été supprimé du panier.');
    return $app['twig']->render('basket.html.twig', array(
        'orders' => $orders));
})->bind('deleteOrder');

//add one game
$app->get('/basket/{id}/addOne', function ($id) use ($app) {
    $app['dao.basket']->upOneBasket($id); 
    $user = $app['user'];
    $orders = $app['dao.basket']->findAllByUser($user->getId());
    return $app['twig']->render('basket.html.twig', array(
        'orders' => $orders));
})->bind('addOneOrder');

//remove one game
$app->get('/basket/{id}/remove', function ($id) use ($app) {
    $app['dao.basket']->downOneBasket($id);
    $user = $app['user'];
    $orders = $app['dao.basket']->findAllByUser($user->getId());
    return $app['twig']->render('basket.html.twig', array(
        'orders' => $orders));
})->bind('removeOneOrder');
