<?php $_SESSION['title'] = "Lista użytkowników"; ?>

<?php require_once __DIR__ . './../header.php'; ?>

<?php showCustomSessionValue('register:new:account:info', 'green', '28', 'center') ?>

<div class="card card-cascade narrower">

    <h1>Lista użytkowników</h1>

    <div class="px-4">
        <div class="table-wrapper">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="th-lg"> # </th>
                        <th class="th-lg"> Email </th>
                        <th class="th-lg"> Role </th>
                        <th class="th-lg"> Status </th>
                        <th class="th-lg"> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    function checkValueToSelect($fieldRole, $userRole)
                    {
                        if ($fieldRole == $userRole) {
                            return 'selected';
                        }
                    }

                    $counter = 1;

                    $users = \App\Repository\UserRepository::getAllUsers();

                    if ($users != null) {
                        foreach ($users as $user) {
                            echo '
                            <tr>
                                <form method = "post" action = "index.php?action=updateUserAttributes">
                                    <td>' . $counter . '</td>
                                    <td>' . $user->getEmail() . '</td>
                                    <td>
                                        <select class="browser-default custom-select" name = "role">
                                            <option value="user"' . checkValueToSelect('user', $user->getRole()) . '>User</option>
                                            <option value="admin"' . checkValueToSelect('admin', $user->getRole()) . '>Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="browser-default custom-select" name = "status">
                                            <option value="active" ' . checkValueToSelect('active', $user->getStatus()) . '>Active</option>
                                            <option value="disable" ' . checkValueToSelect('disable', $user->getStatus()) . '>Disable</option>
                                        </select>
                                    </td>
                                    <td><button type="submit" class="btn btn-outline-primary btn-sm m-0 waves-effect">Zapisz zmiany</button></td>

                                    <input type = "hidden" name = "id" value = ' . $user->getId() . '>
                                </form>
                            </tr>
                          ';

                            $counter++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . './../footer.php'; ?>