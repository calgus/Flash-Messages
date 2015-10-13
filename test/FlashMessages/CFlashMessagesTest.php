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
    public function testGetSessionMessageClean()
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
    
    /**
     * Test
     *
     * @return void
     *
     */
    public function testGetSessionMessage()
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
        $output = "<div class='flashmessages'>";
        foreach ($messages as $index => $value) {
                $type = $value['type'];
                $message = $value['message'];
                $output .= "<p class='{$type} messages'>";
                $output .= $type;
                $output .= ": ";
                $output .= $message;
                $output .= "</p>";
        }    
        $output .= "</div>";
        $name2 = $flash->getSessionMessage();
        $this->assertEquals($output, $name2, "Form element value missmatch, method.");
    }
    
    /**
     * Test
     *
     * @return void
     *
     */
    public function testGetMessage()
    {
        $flash = new \Anax\FlashMessages\CFlashMessages();
        $di    = new \Anax\DI\CDIFactoryDefault();
        $flash->setDI($di);

        $message = "testing message";
        $flash->setMessage($message);
        $messages = $flash->getMessage();
        $this->assertEquals($message, $messages, "Form element value missmatch, method.");   
    }
}
