<?php 
	class User{
		private $db;

		public function __construct()
		{
			$this->db = new Database;
		}

		/**
		 * Login, find user in DB with 'user_email' and 'password'
		 *
		 * @param [string] $email
		 * @param [string] $password
		 * @return false/mixed
		 */
		public function login($email, $password) {
			$this->db->query('SELECT * FROM users WHERE email = :email');

			// Bind value
			$this->db->bind(':email', $email);
			
			$row = $this->db->single();

			$hashed_password = $row->password;

			if (password_verify($password, $hashed_password)) {
				return $row;
			} else {
				return false;
			}
		}

		/**
		 * Register, add user to DB
		 *
		 * @param $data register data('user_name', 'user_email','password') 
		 * @return true/false
		 */
		public function register($data) {
			$this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');

			// Bind values
			$this->db->bind('username', $data['username']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('password', $data['password']);

			// Execute function
			if ($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * List all user
		 *
		 * @return array
		 */
		public function getUsers() {
			$this->db->query("SELECT * FROM users");

			$result = $this->db->resultSet();

			return $result;
		}

		/**
		 * Find user by email address in DB
		 *
		 * @param [string] $email
		 * @return true/false
		 */
		public function findUserByEmail($email) {
			// Prepared statement
			$this->db->query('SELECT * FROM users WHERE email = :email');

			// Email param will be bind with the email variable
			$this->db->bind(':email', $email);

			$this->db->execute();
			return $this->db->rowCount();
			// Check if email already registered
			if ($this->db->rowCount() > 0) {
				return true;
			}else {
				return false;
			}
		}

		/**
		 * Find user by username
		 *
		 * @param [string] $username
		 * @return true/false
		 */
		public function findUserByUsername($username) {
			// Prepared statement
			$this->db->query('SELECT * FROM users WHERE username = :username');

			// Bind username data
			$this->db->bind(':username', $username);

			$this->db->execute();

			return $this->db->rowCount();
			// Check if username already registered
			if ($this->db->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}