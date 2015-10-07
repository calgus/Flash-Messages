<?php

namespace Anax\FlashMessages;

/**
 * To attach flash comments to a page/content in post format and check message sent.
 *
 */
class FlashController
{
    use \Anax\DI\TInjectable;

    /**
     * Outputs session message in view flash.tpl.php.
     *
     * @return void
     */
    public function indexAction()
    {
        $this->theme->addStylesheet('css/flash.css');
        $output = $this->flash->getSessionMessage();
        $this->views->add('flash/flash', [
            'output' => $output,    
        ]);
    }

    /**
     * Checks post for messages and runs flash message code.
     *
     * @return void
     */
    public function postAction() 
    {
        if ($this->request->getPost('messageRadio') == 'Error') {
            $this->flash->errorMessage($this->request->getPost('message'));  
        } else if ($this->request->getPost('messageRadio') == 'Success') {
            $this->flash->successMessage($this->request->getPost('message'));           
        } else if ($this->request->getPost('messageRadio') == 'Notice') {
            $this->flash->noticeMessage($this->request->getPost('message'));           
        } else if ($this->request->getPost('messageRadio') == 'Warning') {
            $this->flash->warningMessage($this->request->getPost('message'));           
        }
        
        $this->response->redirect($this->request->getPost('redirect'));
    }
    
}
