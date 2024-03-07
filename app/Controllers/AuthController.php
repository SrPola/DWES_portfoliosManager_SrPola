<?php

    namespace App\Controllers;

    use App\Models\Users;

    class AuthController extends BaseController{
        public function loginAction() {
            if (isset($_POST) && !empty($_POST)) {
                $user = Users::getInstancia();
                if ($user->login($_POST)) {
                    $_SESSION["perfil"] = "usuario";
                } else {
                    die("Usuario o contraseña incorrectos");
                }
                header("Location: /");
            }
            $this->renderHTML("../app/Views/login_view.php");
        }

        public function registerAction() {
            if (isset($_POST) && !empty($_POST)) {
                $user = Users::getInstancia();
                $user->register($_POST);
                header("Location: /login");
            }
            $this->renderHTML("../app/Views/register_view.php");
        }

        public function logoutAction() {
            session_unset();
            session_destroy();
            header("Location: /login");
        }
    }
