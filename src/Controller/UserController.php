<?php

namespace App\Controller;

class UserController
{
    public static function requireLogin()
    {
        if (!self::checkIfUserIsLoggedIn()) {
            \App\Controller\ErrorController::sendError(0); // Dana strona wymaga logowania
            exit();
        }
    }

    public static function checkIfUserIsLoggedIn()
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function forgotPasswordAction()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: ./index.php?action=welcome');
        }

        require_once __DIR__ . '/../../src/Validation/User/forgotPassword.php'; // Walidacja wysłanego formularza - Wysłanie poprawnego
        require_once __DIR__ . '/../View/User/forgotPassword.php';  // Nie wysłany formularz lub zawiera błędy
    }

    public static function resetPasswordAction()
    {
        require_once __DIR__ . '/../../src/Validation/User/resetPassword.php'; // Walidacja danych // Ustanowienie nowego hasła 
        require_once __DIR__ . '/../View/User/resetPassword.php';  // Widok
    }

    public static function changePasswordAction()
    {
        self::requireLogin();
        require_once __DIR__ . '/../../src/Validation/User/changePassword.php'; // Walidacja wysłanego formularza - Wysłanie poprawnego
        require_once __DIR__ . '/../View/User/changePassword.php';  // Nie wysłany formularz lub zawiera błędy
    }

    public static function logoutAction()
    {
        self::requireLogin();
        session_destroy();
        header('Location: ./index.php?action=login');
    }
}
