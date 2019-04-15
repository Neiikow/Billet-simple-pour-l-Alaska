<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class ProfilController {
    public function index(){
        $memberManager = \DBFactory::getManager('member');

        if (isset($_POST['edit-member'])) {
            $this->edit($memberManager);
        }
        $user = $memberManager->getMember($_SESSION['name']);
        require_once('view/admin/templateProfile.php');
    }
    public function edit($manager){
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'email' => htmlspecialchars($_POST['email']),
            'phone' => htmlspecialchars($_POST['phone']),
            'city' => htmlspecialchars($_POST['city']),
            'street' => htmlspecialchars($_POST['street']),
            'postal' => htmlspecialchars($_POST['postal']),
            'id' => htmlspecialchars($_GET['id'])
        ];
        $pw =  htmlspecialchars($_POST['password']);
        $pwConfirm = htmlspecialchars($_POST['confirm-password']);
        if (!empty($pw) || !empty($pwConfirm)) {
            if ($pw === $pwConfirm) {
                $data['password'] = password_hash($pw, PASSWORD_DEFAULT);
            }
            else {
                throw new \Exception("Confirmation du mot de passe incorrecte");
            }
        }
        $member = new \Jordan\Blog\Model\Member($data);
        $manager->editMember($member);
        $_SESSION['name'] = $member->name();
    }
}