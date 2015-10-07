<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential settings.
require __DIR__.'/config.php'; 


// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

// Set FlashMessages in DI.
$di->set('flash', function() use ($di) {
    $flash = new \Anax\Flash\CFlashBasic();
    $flash->setDI($di);
    return $flash;
});

// Set FlashController in DI.
$di->set('FlashController', function() use ($di) {
    $flashController = new \Anax\Flash\FlashController();
    $flashController->setDI($di);
    return $flashController;
});

$app = new \Anax\Kernel\CAnax($di);

// Home route
$app->router->add('', function() use ($app) {
        
    $app->theme->setTitle("Flash messages");
    $app->dispatcher->forward([
        'controller' => 'flash',
        'action'     => 'index',
    ]);
});


// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
