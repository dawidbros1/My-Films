<?php $_SESSION['title'] = "Szczeguły filmu"; ?>
<?php $_SESSION['css'] = "item" ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<?php

$item = \App\Repository\ItemRepository::getItemById($id);

?>

<h1> <?php echo $item->getTitle(); ?> </h1>

<div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
    <?php

    for ($j = $item->getRate(); $j > 0; $j--) {

        if ($j == $item->getRate()) {
            echo '<input type="radio" checked><label></label>';
        } else {
            echo '<input type="radio" ><label></label>';
        }
    }
    ?>
</div>


<div class="row">
    <div class="form-group col-12 px-5">
        <div><?php echo $item->getDescription(); ?></div>
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>