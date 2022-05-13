<?php
class User
{
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	/**
	 * Check password be the same in DB or not
	 *
	 * @param [string] $email
	 * @param [string] $password
	 * @return false/true
	 */
	public function checkPassword($password, $user_id) {
		$this->db->query('SELECT * FROM users WHERE user_id = :user_id');

		// Bind value
		$this->db->bind(':user_id', $user_id);
		// Execute
		$row = $this->db->single();
		if (!$row) {
			return false;
		}

		$hashed_password = $row->password;
		if (password_verify($password, $hashed_password)) {
			return true;
		} 
		return false;
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
		// Execute
		$row = $this->db->single();
		if (!$row) {
			return false;
		}

		$hashed_password = $row->password;
		if (password_verify($password, $hashed_password)) {
			return $row;
		} 
		return false;
	}

	/**
	 * Find user in DB with 'token'
	 *
	 * @param [string] $email
	 * @param [string] $password
	 * @return false/mixed
	 */
	public function getUserByToken($token) {
		$this->db->query('SELECT * FROM users WHERE token = :token');

		// Bind value
		$this->db->bind(':token', $token);
		// Execute
		$row = $this->db->single();
		if (!$row) {
			return false;
		}
		return $row;
	}

	/**
	 * Register, add user to DB
	 *
	 * @param $data register data('user_name', 'user_email','password') 
	 * @return true/false
	 */
	public function register($data) {
		$this->db->query('INSERT INTO users (username, email, password, first_name, last_name, img_url) VALUES (:username, :email, :password, :first_name, :last_name, :img_url)');

		// Bind values
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('first_name', 'Chưa cập nhật');
		$this->db->bind('last_name', 'Chưa cập nhật');
		$this->db->bind('img_url', 'avt.png');

		// Execute function
		if ($this->db->execute()) {
			return true;
		} 
		return false;
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
	 * Update user data
	 *
	 * @param [string] $first_name
	 * @param [string] $last_name
	 * @param [string] $position
	 * @param [string] $phone
	 * @param [string] $address
	 * @param [string] $user_id
	 * @return true/false
	 */
	public function updateUser($first_name, $last_name, $position, $phone, $address, $user_id) {
		$this->db->query("UPDATE users SET first_name = :first_name, last_name = :last_name, position = :position, phone = :phone, address = :address WHERE user_id = :user_id");

		// Bind value
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':first_name', $first_name);
		$this->db->bind(':last_name', $last_name);
		$this->db->bind(':position', $position);
		$this->db->bind(':phone', $phone);
		$this->db->bind(':address', $address);

		// Execute
		$this->db->execute();

		if ($this->db->rowCount() > 0) {
			return true;
		}
		return false;
	}

	/**
	 * Update user img
	 *
	 * @param [string] $img_url
	 * @param [string] $user_id
	 * @return true/false
	 */
	public function updateUserImg($img_url, $user_id) {
		$this->db->query("UPDATE users SET img_url = :img_url WHERE user_id = :user_id");

		// Bind value
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':img_url', $img_url);
		
		// Execute
		$this->db->execute();

		if ($this->db->rowCount() > 0) {
			return true;
		} 
		return false;
	}

	/**
	 * Update user password
	 *
	 * @param [string] $password
	 * @param [string] $user_id
	 * @return true/false
	 */
	public function updateUserPassword($password, $user_id) {
		$this->db->query("UPDATE users SET password = :password WHERE user_id = :user_id");

		// Bind value
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':password', $password);

		// Execute
		$this->db->execute();

		if ($this->db->rowCount() > 0) {
			return true;
		} 
		return false;
	}

	/**
	 * Update user token
	 *
	 * @param [sting] $token
	 * @param [sting] $user_id
	 * @return true/false
	 */
	public function updateToken($token, $user_id) {
		$this->db->query("UPDATE users SET token = :token WHERE user_id = :user_id");

		// Bind value
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':token', $token);

		$this->db->execute();

		if ($this->db->rowCount() > 0) {
			return true;
		} 
		return false;
	}


	/**
	 * Load user data by user_id
	 *
	 * @param [string] $user_id
	 * @return mixed/false
	 */
	public function loadUserData($user_id) {
		$this->db->query("SELECT * FROM users WHERE user_id = :user_id");

		// Bind value
		$this->db->bind(':user_id', $user_id);

		// Execute
		$row = $this->db->single();
		if (!$row) {
			return false;
		}
		return $row;
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

		// Check if email already registered
		if ($this->db->rowCount() > 0) {
			return true;
		}
		return false;
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

		// Check if username already registered
		if ($this->db->rowCount() > 0) {
			return true;
		} 
		return false;	
	}
}
