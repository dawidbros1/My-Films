<?php

namespace App\Controller;

class ItemController
{
    public static function addItemAction()
    {
        \App\Controller\UserController::requireLogin();
        require_once __DIR__ . '/../../src/Validation/Item/addItem.php'; // Walidacja wysłanego formularza - Wysłanie poprawnego
        require_once __DIR__ . '/../View/Item/addItem.php';   // Nie wysłano formularza lub są w nim błędy
    }

    public static function listItemsAction()
    {
        \App\Controller\UserController::requireLogin();
        require_once __DIR__ . '/../View/Item/listItems.php';
    }


    public static function editItemAction()
    {
        \App\Controller\UserController::requireLogin();

        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) { // Czy zostało wysłane id itemu
            $id = $_REQUEST['id'];

            if (\App\Repository\ItemRepository::checkIfItIsMyItemById($id)) { // Czy ten item należy do mnie
                require_once __DIR__ . '/../../src/Validation/Item/editItem.php'; // Walidacja wysłanego formularza - Wysłanie poprawnego
                require_once __DIR__ . '/../View/Item/editItem.php';   // Nie wysłano formularza lub są w nim błędy
            }
        }
    }

    public static function deleteItemAction()
    {
        \App\Controller\UserController::requireLogin();

        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) { // Czy zostało wysłane id itemu
            $id = $_REQUEST['id'];

            if (\App\Repository\ItemRepository::checkIfItIsMyItemById($id)) { // Czy ten item należy do mnie
                header('Location: index.php?action=listItems');
                \App\Repository\ItemRepository::deleteItemById($id);
                exit();
            }
        }
    }

    public static function showDetailsOfItemAction()
    {
        \App\Controller\UserController::requireLogin();

        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) { // Czy zostało wysłane id itemu
            $id = $_REQUEST['id'];

            if (\App\Repository\ItemRepository::checkIfItIsMyItemById($id)) { // Czy ten item należy do mnie
                require_once __DIR__ . '/../View/Item/showDetailsOfItem.php';
                exit();
            }
        }
        var_dump("1111");
    }
}
