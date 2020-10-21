<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>

    <?php if (isset($_SESSION['css'])) {
        echo '<link rel="stylesheet"href="styles/' . $_SESSION['css'] . '.css">';
        unset($_SESSION['css']);
    } ?>

    <link rel="stylesheet" href="styles/main.css">

    <title>
        <?php
        if (isset($_SESSION['title'])) showSessionValue('title');
        else echo "Strona główna";
        ?>
    </title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php?action=welcome">Start</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <?php
                    if (\App\Controller\UserController::checkIfUserIsLoggedIn()) {
                        echo '

                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=addItem">Dodaj film</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=listItems&type=film">Moje filmy</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=listItems&type=serial">Moje seriale</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./index.php?action=changePassword">Zmień hasło</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?action=logout">Wyloguj</a>
                            </div>
                        </li>
                    ';
                    } else {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=register">Rejestracja</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=login">Logowanie</a>
                        </li>
                    ';
                    }

                    ?>
                </ul>
            </div>
        </nav>

        <div class="all">