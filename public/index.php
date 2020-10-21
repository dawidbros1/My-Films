<?php
session_start();


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Function/Session.php';
require_once __DIR__ . '/../src/Function/Function.php';

if (isset($_REQUEST['action'])) {

    if (App\Controller\UserController::checkIfUserIsLoggedIn()) {
        $id = $_SESSION['user_id'];
        $currentUser = \App\Repository\UserRepository::getCurrentUser();
    }

    switch ($_REQUEST['action']) {

            // ==== Użytkownik ==== // 90% -> Zrobić ładniejsze strony do przywrócenia hasła

        case 'register': {
                \App\Controller\AuthController::registerAction();
                break;
            }

        case 'login': {
                \App\Controller\AuthController::loginAction();
                break;
            }

        case 'logout': {
                \App\Controller\UserController::logoutAction();
                break;
            }

        case 'changePassword': {
                \App\Controller\UserController::changePasswordAction();
                break;
            }

        case 'forgotPassword': {
                \App\Controller\UserController::forgotPasswordAction();
                break;
            }

        case 'resetPassword': {
                \App\Controller\UserController::resetPasswordAction();
                break;
            }
            // ==== Items ==== //

        case 'addItem': {
                \App\Controller\ItemController::addItemAction();
                break;
            }

        case 'listItems': {
                \App\Controller\ItemController::listItemsAction();
                break;
            }

        case 'editItem': {
                \App\Controller\ItemController::editItemAction();
                break;
            }

        case 'deleteItem': {
                \App\Controller\ItemController::deleteItemAction();
                break;
            }

        case 'showDetailsOfItem': {
                \App\Controller\ItemController::showDetailsOfItemAction();
                break;
            }

            // ==== Inne ==== //

        case 'start': {
                require_once __DIR__ . '/../src/View/start.php';
                break;
            }

        default:
            header('Location: ./index.php?action=start');
            break;
    }
} else {
    header('Location: ./index.php?action=start');
    exit();
}
