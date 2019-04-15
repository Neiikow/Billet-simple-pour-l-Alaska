<?php
session_start();
if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'visitor';
}
require_once('controller/ConnexionController.php');
require_once('controller/HomeController.php');
require_once('controller/ArticlesController.php');
require_once('controller/ContactController.php');
require_once('controller/admin/AdminArticlesController.php');
require_once('controller/admin/CommentsController.php');
require_once('controller/admin/NewController.php');
require_once('controller/admin/EditController.php');
require_once('controller/admin/ReportedController.php');
require_once('controller/admin/ProfilController.php');
require_once('controller/admin/SettingsController.php');

try {
    if (isset($_POST['sign-in'])) {
        $connexion = new Jordan\Blog\Controller\ConnexionController;
        $connexion->login();
    }
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        $connexion = new Jordan\Blog\Controller\ConnexionController;
        $connexion->logout();
    }
    if (isset($_GET['page'])) {
        switch($_GET['page'])
        {
            // Pages Publiques
            case "home":
                $ctrl = new Jordan\Blog\Controller\HomeController;
                $ctrl->index();
                break;
            case "articles":
                $ctrl = new Jordan\Blog\Controller\ArticlesController;
                $ctrl->index();
                break;
            case "contact":
                $ctrl = new Jordan\Blog\Controller\ContactController;
                $ctrl->index();
                break;
            // Pages d'administration
            case "articlesManager":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\AdminArticlesController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "commentsManager":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\CommentsController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "new":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\NewController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "edit":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\EditController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "reported":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\ReportedController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "profile":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\ProfilController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            case "settings":
                if ($_SESSION['role'] === 'admin') {
                    $ctrl = new Jordan\Blog\Controller\Admin\SettingsController;
                    $ctrl->index();
                } else {
                    throw new Exception("Accès refusé");
                }
                break;
            default:
                throw new Exception("Page introuvable");
                break;
        }
    } else {
        $ctrl = new Jordan\Blog\Controller\HomeController;
        $ctrl->index();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    require_once('view/error/pageNotFound.php');
}