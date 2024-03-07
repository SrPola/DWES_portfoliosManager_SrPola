<?php
    namespace App\Controllers;

    use App\Models\Users;

    class IndexController extends BaseController {
        public function indexAction() { // De momento no existe IndexController
            if ($_SESSION["perfil"] == "invitado") {
                header("Location: /login");
            }

            $data = [
                "message" => "Hello World!"
            ];
            $this->renderHTML("../app/Views/index_view.php", $data); // La ruta parte de la ubicacion del fichero index.php
        }

        public function registerAction() {
            if (isset($_POST) && !empty($_POST)) {
                $user = Users::getInstancia();
                $user->register($_POST);
                header("Location: /login");
            }
            $this->renderHTML("../app/Views/register_view.php");
        }
    }
