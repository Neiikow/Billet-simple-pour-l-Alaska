<?php
namespace Jordan\Blog\Controller;

require_once('controller/DBFactory.php');

class ContactController {
    public function index(){
        $memberManager = \DBFactory::getManager('member');
        $admin = $memberManager->getRole('admin');
        if (isset($_POST['new-email'])) {
            $this->sendMail();
            $success = "Email envoyé avec succès !";
        }
        require_once('view/templateContact.php');
    }
    public function sendMail(){
        $to      = htmlspecialchars($_POST['emailFocus']);
        $subject = htmlspecialchars($_POST['title']);
        $message = wordwrap(htmlspecialchars($_POST['message']), 70, "\r\n");
        $headers = 'From: '. htmlspecialchars($_POST['email']);

        //mail($to, $subject, $message, $headers); 
    }
}