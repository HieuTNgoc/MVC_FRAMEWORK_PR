<?php 
	class User{
		private$db;

		public function __construct()
		{
			$this->db = new Database;
		}

		public function getUsers() {
			$this->db->query("SELECT * FROM users");

			$result = $this->db->resultSet();

			return $result;
		}

		public function findUserByEmail($email) {
			// Prepared statement
			$this->db->query('SELECT * FROM users WHERE email = :email');

			// Email param will be bind with the email variable
			$this->db->bind(':email', $email);

			// Check if email already registered
			if ($this->db->rowCount() > 0) {
				return true;
			}else {
				return false;
			}
		}
	}