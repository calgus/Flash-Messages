# Flash message in session module to be used by Anax MVC

Saves messages in session and pulls them from session to be displayed. Used in conjunction with Anax-MVC

## Installation

Install using Packagist or clone code from Github:
```
"calgus/flash": "dev-master"
```

Add following text to apply flash in DI in your Anax MVC framework:
```
$di->set('flash', function() use ($di) {
    $flash = new \Anax\Flash\CFlashBasic();
    $flash->setDI($di);
    return $flash;
});
```

Add following text to apply Flash Controller in DI in your Anax MVC framework:
```
$di->set('FlashController', function() use ($di) {
    $flashController = new \Anax\Flash\FlashController();
    $flashController->setDI($di);
    return $flashController;
});
```
Flash Controller is only used as an example to display post flash messages and is not needed for module use.
Use
```
$messages = $this->flash->getSessionMessageClean();
foreach ($messages as $index => $value) {
    $type = $value['type'];
    $message = $value['message'];
}
```
to access the session name yourself.

These are optional commands to use when you want to save a message or display messages.

To save messages in session -
Error message:
```
$app->flash->errorMessage('Error message');
```
Success message:
```
$app->flash->successMessage('Success message');
```
Notice message:
```
$app->flash->noticeMessage('Notice message');
```
Warning message:
```
$app->flash->warningMessage('Warning message');
```

To get the messages either use -
Get clean array with all messages stored in session:
```
$app->flash->getSessionMessageClean();
```
Get p tags with messages type and containing messages:
```
$app->flash->getSessionMessage();
```
Use $this instead of $app while inside DI classes and apps.

## Detailed instructions.
1. Copy flash-messages.php from webroot to your webroot folder.
2. Copy src/FlashMessages folder to your src folder.
3. Copy app/view/flash to your app/view folder.
4. Copy webroot/css/flash.css to your webroot/css folder.
5. Open flash-messages.php file in browser and enjoy.
