<?php
namespace Jordan\Blog\Controller;

require_once('controller/DBFactory.php');

class ConnexionController {
    public function login(){
        $memberManager = \DBFactory::getManager('member');

        $user =  $memberManager->getMember(htmlspecialchars($_POST['name']));
        if ($user === null) {
            throw new \Exception("Pseudo ou mot de passe incorrect");
        }
        $pwCheck = password_verify(htmlspecialchars($_POST['password']), $user->password());
        if ($pwCheck) {
            $_SESSION['role'] = $user->role();
            $_SESSION['name'] = $user->name();
            $_SESSION['id'] = $user->id();
        } else {
            throw new \Exception("Pseudo ou mot de passe incorrect");
        }
    }
    public function logout(){
        $_SESSION['role'] = 'visitor';
        $_SESSION['name'] = '';
        $_SESSION['id'] = '';
        header('Location: index.php?page=home');
    }
}