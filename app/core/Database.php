<?php
    class Database {
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASS;
        private $dbName = DB_NAME;

        private $statement;
        private $dbHandler;
        private $error;

        public function __construct() {
            $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try{
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
            }catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        /**
         * Prepares a statement for execution
         *
         * @param [string] $sql
         * @return void
         */
        public function query($sql) {
            $this->statement = $this->dbHandler->prepare($sql);
        }

        /**
         * Binds a value to a parameter
         *
         * @param [string] $parameter
         * @param [mixed] $value
         * @param [int] $type
         * @return void
         */
        public function bind($parameter, $value, $type = null) {
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parameter, $value, $type);
        }

        /**
         * Executes a prepared statement
         *
         * @return void
         */
        public function execute() {
            return $this->statement->execute();
        }

        /**
         * Fetches the remaining rows from a result set
         *
         * @return array
         */
        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        /**
         * PDOStatement::fetch — Fetches the next row from a result set
         *
         * @return mixed
         */
        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        /**
         * Returns the number of rows affected by the last SQL statement
         *
         * @return int
         */
        public function rowCount() {
            return $this->statement->rowCount();
        }
    }
?>