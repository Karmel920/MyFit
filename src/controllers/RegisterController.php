<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserParameters.php';
require_once __DIR__.'/../models/UserMacros.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/UserParametersRepository.php';
require_once __DIR__.'/../repository/UserMacrosRepository.php';

class RegisterController extends AppController
{
    private $userRepository;
    private $userParametersRepository;
    private $userMacrosRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->userParametersRepository = new UserParametersRepository();
        $this->userMacrosRepository = new UserMacrosRepository();
    }

    public function register()
    {
        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST["email"];
        $password = sha1($_POST["password"]);
        $confirmedPassword = sha1($_POST["confirm-password"]);

        $user = $this->userRepository->getUserByEmail($email);

        if($user) {
            return $this->render('register', ['messages' => ['User with this email exist!']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, $password);
        $this->userRepository->addNewUser($user);
        $user = $this->userRepository->getUserByEmail($email);

        $userParameters = new UserParameters(null, null, null, null, null, $user->getIdUser());
        $userMacros = new UserMacros(null, null, null, null, $user->getIdUser());

        $this->userParametersRepository->addUserParameters($userParameters);
        $this->userMacrosRepository->addUserMacros($userMacros);

        return $this->render('register', ['messages' => ['Registration was successful, sign in!']]);
    }
}