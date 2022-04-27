<?php
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login () {
        $data = [ 
            'title' => 'Login - Base Account'
        ];

        $this->view('users/login', $data);
    }

    public function register () {
        $data = [ 
            'title' => 'Register - Base Account'
        ];

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