<?php

namespace App\Controller;

class AuthController
{
    public static function registerAction()
    {
        if (\App\Controller\UserController::checkIfUserIsLoggedIn()) {
            header('Location: ./index.php?action=start');
            exit();
        }

        require_once __DIR__ . '/../../src/Validation/Auth/register.php'; // Walidacja wysłanego formularza - Wysłanie poprawnego
        require_once __DIR__ . '/../View/Auth/register.php'; // Gdy nie wysłano formularza lub są błędy
    }


    public static function loginAction()
    {
        if (\App\Controller\UserController::checkIfUserIsLoggedIn()) {
            header('Location: ./index.php?action=start');
            exit();
        }

        require_once __DIR__ . '/../../src/Validation/Auth/login.php'; // Walidacja wysłanego formularza - Gdy poprawny to ustawienie sesji
        require_once __DIR__ . '/../View/Auth/login.php';  // Gdy nie wysłano formularza lub zawiera błędy
    }
}
