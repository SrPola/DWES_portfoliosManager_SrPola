<?php
    namespace App\Models;
    

    class Projects extends DBAbstractModel {
        private static $instancia;

        public static function getInstancia() {
            if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }

        public function getAll($id) {
            $this->query = "SELECT * FROM projects WHERE user_id = :id";
            $this->params["id"] = $id;
            $this->get_results_from_query();
            return $this->rows ?? "";
        }

        public function get() {

        }
        public function set($datos) {
            $this->query = "INSERT INTO projects (title, description, technologies, user_id) VALUES (:title, :description, :technologies, :user_id)";
            $this->params = [
                "title" => $datos["title"],
                "description" => $datos["description"],
                "technologies" => $datos["technologies"],
                "user_id" => $datos["user_id"]
            ];
            $this->get_results_from_query();
        }
        public function edit() {

        }
        public function delete() {
            
        }
    }