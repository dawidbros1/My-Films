<?php

if ( // Czy jest wysłany formularz
    isset($_REQUEST['email']) &&
    isset($_REQUEST['password']) &&
    isset($_REQUEST['confirm_password'])
) { // Formularz wysłany

    // Pobranie wysłanych danychh
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    $error = false;

    // Start => Walidacja danych wysłanych przez użytkownika

    if (!isset($_REQUEST['checkbox'])) {
        $_SESSION['error:register:regulations'] = 'Nie zaakceptowano regulaminu';
        $error = true;
    } else {
        $_SESSION['register:checkbox:value'] = 'checked';
    }

    $localPasswordError = false;

    if ($password != $confirm_password) {
        $_SESSION['error:register:password:unique'] = 'Podane hasła nie są takie same';
        $error = true;
        $localPasswordError = true;
    }

    if (!checkIfLengthOfStringIsBetweenNumbers($password, 4, 17)) {
        $_SESSION['error:register:password:length'] = 'Hasło musi zawierać od 5 do 16 znaków';
        $error = true;
        $localPasswordError = true;
    }

    if (!$localPasswordError) {
        $_SESSION['register:password:value'] = $password;
        $_SESSION['register:confirm_password:value'] = $confirm_password;
    }

    if (!(\App\Repository\UserRepository::checkUniqueEmail($email))) {
        $_SESSION['error:register:email:unique'] = 'Podany adres email jest już zajęty';
        $error = true;
    } else {
        $_SESSION['register:email:value'] = $email;
    }

    if (!validateEmail($email)) {
        $_SESSION['error:register:email:validate'] = 'Niepoprawny adres email. Upewnij się, że email nie posiada znaków specjalnych oraz nie rozpoczyna się od liczby';
        $error = true;
    }

    // Koniec => Walidacja danych wysłanych przez użytkownika

    if (!$error) { // Walidacja danych przebiegła pomyślnie
        header('Location: ./index.php?action=login');

        $_SESSION['register:new:account:info'] = 'Twoje konto zostało założone. Możesz się teraz na nie zalogować';
        $_SESSION['login:email:value'] = $email;

        $hashPassword = md5($password);
        $user = new \App\Model\User;
        $user->setEmail($email);
        $user->setPassword($hashPassword);
        $user->setRole('user');

        \App\Repository\UserRepository::save($user);
        exit();
    }
}
