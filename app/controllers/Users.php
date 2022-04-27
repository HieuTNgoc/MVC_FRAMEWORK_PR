<?php
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login () {
        $data = [ 
            'title' => 'Login - Base Account',
            'emailError' => '',
            'passwordError' => ''
        ];

        $this->view('users/login', $data);
    }

    public function register () {
        
        $data = [ 
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_POST'] == 'POST') {
            // Sanitize post data
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [ 
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
    
            $nameValidation = "/^[a-zA-Z0-9]*$";

            //Minimum eight characters, at least one letter and one number
            $passwordValidation = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";

            // Validate username on letter or number
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'User name can only contain letters and numbers.';
            }

            // Validate email 
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            }else {
                // Check if email exist
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken. Try again!';
                }
            }

            // Validate password on length(8) and numeric values 
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter the password.';
            }elseif (strlen($data['password']) < 8) {
                $data['passwordError'] = 'Password must be at least 8 characters.';
            }elseif (!preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Please enter the correct';
            }

            // Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter the confirm password.';
            }
            
        }

        $this->view('users/register', $data);
    }

    public function recover () {
        $data = [ 
            'title' => 'Recover - Base Account'
        ];

        $this->view('users/recover', $data);
    }

    public function account () {
        $data = [ 
            'title' => 'Account - Base Account'
        ];

        $this->view('users/account', $data);
    }
}