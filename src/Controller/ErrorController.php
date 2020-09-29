<?php

namespace App\Controller;

// Error list:
// 0 Wymagane logowanie
// 1 Zasób nie istnieje
// 2 Brak uprawnień
// 3 Konto zablokowane
// 4 Niepoprrawny adres strony

class ErrorController
{
    public static function sendError($number)
    {
        switch ($number) {
            case 0: {
                    require_once __DIR__ . '/../View/Error/loginRequired.php';
                    break;
                }

            case 1: {
                    require_once __DIR__ . '/../View/Error/doesNotExist.php';
                    break;
                }

            case 2: {
                    require_once __DIR__ . '/../View/Error/noPermission.php';
                    break;
                }

            case 3: {
                    require_once __DIR__ . '/../View/Error/accountBlocked.php';
                    break;
                }
            case 4: {
                    require_once __DIR__ . '/../View/Error/incorrectPageAddress.php';
                    break;
                }
        }
    }
}
