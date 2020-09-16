<?php $_SESSION['title'] = "Moje filmy"; ?>
<?php $_SESSION['css']  = 'item' ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Moje filmy</h1>

    <?php showCustomSessionValue('info', 'green', '28', 'center') ?>

    <div class="row">

        <?php

        for ($i = 10; $i > 0; $i--) {
            $items = \App\Repository\ItemRepository::getAllItemsForCurrentUserByRating($i);

            if ($items != NULL) {
                echo '<row class = "col-12">';
                echo '<div class="starrating risingstar d-flex justify-content-center flex-row-reverse">';


                for ($j = $i; $j > 0; $j--) {

                    if ($j == $i) {
                        echo '<input type="radio" checked><label></label>';
                    } else {
                        echo '<input type="radio" ><label></label>';
                    }
                }

                echo '</div>';
                echo '</row>';

                foreach ($items as $item) {
                    echo '
                    <div class="col col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-white bg-primary mt-1 mb-2">
    
                        <div class="card-header text-white"> ' . $item->getTitle() . ' </br>    
    
                        </div>
                      
                        <form action = "./index.php" method="get" class = "delete">
                            <button type="submit" class="btn btn-danger" name = "action" value = "deleteItem">X</button>
                            <input type = "hidden" name = "id" value =' . $item->getId() . '>
                        </form>
    
                        <form action = "./index.php" method="get" class = "edit">
                            <button type="submit" class="btn btn-success" name = "action" value = "editItem">Edytuj</button>
                            <input type = "hidden" name = "id" value =' . $item->getId() . '>
                        </form>
    
                        <a href="index.php?action=showDetailsOfItem&id=' . $item->getId() . '" class = "fullSize">
                            <div class="card-body" style="background-image: url(' . $item->getImage_src() . ');" >
    
                            </div>
                        </a>
    
                    </div>
                </div>
                    ';
                }
            }
        }

        ?>

    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>