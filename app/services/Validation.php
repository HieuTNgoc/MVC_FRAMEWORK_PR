<?php
class Validation
{
	/**
	 * Validate username
	 *
	 * @return true/false
	 */
	public function nameValidation($username) {
		// Validate username on letter or number
		$name_validation = '/^[a-zA-Z0-9]*$/';

		if (empty($username)) {
			return 'Please enter username.';
		} 
		
		if (!preg_match($name_validation, $username)) {
			return 'User name can only contain letters and numbers.';
		} 
			
		return 'true';
	}

	/**
	 * Validate email
	 *
	 * @return string
	 */
	public function emailValidation($email) {

		if (empty($email)) {
			return 'Please enter email address.';
		} 

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return 'Please enter the correct email format.';
		}

		return 'true';
	}

	/**
	 * Validate password
	 *
	 * @return string
	 */
	public function passwordValidation($password) {
		//Minimum eight characters, at least one letter and one number
		$passwordValidation = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

		// Validate password on length(8) and numeric values 
		if (empty($password)) {
			return 'Please enter the password.';
		} 

		if (strlen($password) < 8) {
			return 'Password must be at least 8 characters.';
		} 

		if (!preg_match($passwordValidation, $password)) {
			return 'Please enter the correct password format.';
		}

		return true;
	}

	/**
	 * Validate datetime
	 *
	 * @return true/false
	 */
	public function datetimeValidation() {

	}
}
