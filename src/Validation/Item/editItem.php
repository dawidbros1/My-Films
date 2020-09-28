<?php

if (
    isset($_REQUEST['title']) && !empty($_REQUEST['title'])
    && isset($_REQUEST['rate']) && !empty($_REQUEST['rate'])
    && isset($_REQUEST['desctiption']) && !empty($_REQUEST['desctiption'])
    && isset($_REQUEST['image_src']) && !empty($_REQUEST['image_src'])
    && isset($_REQUEST['type']) && !empty($_REQUEST['type'])
    && isset($_REQUEST['id']) && !empty($_REQUEST['id'])
) {
    global $currentUser;
    $error = false;

    $title = $_REQUEST['title'];
    $rate = $_REQUEST['rate'];
    $desctiption = $_REQUEST['desctiption'];
    $image_src = $_REQUEST['image_src'];
    $type = $_REQUEST['type'];
    $id = $_REQUEST['id'];

    //! Validacja danych - START
    // Sprawdzenie długości znaków - START

    if (strlen($title) > 32) {
        $error = true;
        $_SESSION['error:item:title:strlen'] = 'Nazwa filmu nie może być dłuższa niż 32 znaki';
    }

    if (strlen($image_src) > 255) {
        $error = true;
        $_SESSION['error:item:image_src:strlen'] = 'Adres do obrazka fillmu nie może być dłuższy niż 255 znaków';
    }

    if (strlen($desctiption) > 10000) {
        $error = true;
        $_SESSION['error:item:desctiption:strlen'] = 'Opis filmy nie może być dłuższy niż 10000 znaków';
    }

    if ($type != "film" && $type != "serial") {
        $error = true;
        $_SESSION['error:item:type:strlen'] = 'Nieprawidłowy typ filmu';
    }

    $rateError = true;

    for ($i = 1; $i <= 10; $i++) {
        if ($rate == $i) {
            $rateError = false;
        }
    }

    if ($rateError) {
        $error = true;
        $_SESSION['error:item:rate:correct'] = 'Ocena musi być liczbą całkowitą (1-10)';
    }

    // Sprawdzenie długości znaków - KONIEC
    //! Validacja danych - KONIEC

    if (!$error) {
        header('Location: index.php?action=listItems');

        global $currentUser;

        $item = \App\Repository\ItemRepository::getItemById($id);
        $item->setTitle($title);
        $item->setRate($rate);
        $item->setDescription($desctiption);
        $item->setImage_src($image_src);
        $item->setType($type);

        \App\Repository\ItemRepository::save($item);
        $_SESSION['info'] = "Filmy został edytowany";
        exit();
    }
}
