<?php

namespace Mos\Mumin;

/**
 * A testclass
 * 
 */
class CFlashMessagesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test
     *
     * @return void
     *
     */
    public function testGetNameFromSession()
    {
        $flash = new \Anax\FlashMessages\CFlashMessages();
        $di    = new \Anax\DI\CDIFactoryDefault();
        $flash->setDI($di);

        $di->setShared('session', function () {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            //$session->start();
            return $session;
        });

        $message = "testing message";
        $flash->errorMessage($message);
        $flash->warningMessage($message);
        $flash->noticeMessage($message);
        $flash->successMessage($message);
        $messages = $flash->getSessionMessageClean();
        foreach ($messages as $index => $value) {
            $this->assertEquals($message, $value['message'], "Form element value missmatch, method.");
        }
        
    }
}
