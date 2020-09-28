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

        if (isset($_REQUEST['type'])) {
            $type = $_REQUEST['type'];

            if ($type == 'film' || $type = "serial") {
                require_once __DIR__ . '/../View/Item/listItems.php';
            } else {
                // Błąd
            }
        }
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
                $type = \App\Repository\ItemRepository::getItemById($id)->getType();
                header('Location: index.php?action=listItems&type=' . $type . '');
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
