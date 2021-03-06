<?php $_SESSION['title'] = "Edycja filu"; ?>
<?php $_SESSION['css']  = 'item' ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Edycja filmu</h1>

    <?php

    $item = \App\Repository\ItemRepository::getItemById($id);

    ?>

    <form action="./index.php?action=editItem" method="post">
        <div class="form-group">
            <label>Nazwa filmu</label>
            <input type="text" class="form-control" name="title" value='<?php echo $item->getTitle(); ?>'>
        </div>

        <?php showErrorSessionValue('error:item:title:strlen') ?>

        <!-- == () == -->

        <div class="form-group">
            <label>Adres obrazka</label>
            <input type="text" class="form-control" name="image_src" value='<?php echo $item->getImage_src(); ?>'>
        </div>

        <?php showErrorSessionValue('error:item:image_src:strlen') ?>

        <!-- == () == -->

        <div class="form-group">
            <label>Typ filmu</label>
            <select class="form-control" name="type">
                <option value="film" <?php compareValue('film', $item->getType(), 'selected'); ?>>Film</option>
                <option value="serial" <?php compareValue('serial', $item->getType(), 'selected'); ?>>Serial</option>
            </select>
        </div>

        <?php showErrorSessionValue('error:item:type:strlen') ?>

        <!-- == () == -->

        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" rows="20" name="desctiption"><?php echo $item->getDescription(); ?></textarea>
        </div>

        <?php showErrorSessionValue('error:item:desctiption:strlen') ?>

        <!-- == () == -->

        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
            <input type="radio" <?php compareValue(10, $item->getRate(), ' checked ') ?> id="star10" name="rate" value="10" /><label for="star10" title="10 star"></label>
            <input type="radio" <?php compareValue(9, $item->getRate(), ' checked ') ?> id="star9" name="rate" value="9" /><label for="star9" title="9 star"></label>
            <input type="radio" <?php compareValue(8, $item->getRate(), ' checked ') ?> id="star8" name="rate" value="8" /><label for="star8" title="8 star"></label>
            <input type="radio" <?php compareValue(7, $item->getRate(), ' checked ') ?> id="star7" name="rate" value="7" /><label for="star7" title="7 star"></label>
            <input type="radio" <?php compareValue(6, $item->getRate(), ' checked ') ?> id="star6" name="rate" value="6" /><label for="star6" title="6 star"></label>
            <input type="radio" <?php compareValue(5, $item->getRate(), ' checked ') ?> id="star5" name="rate" value="5" /><label for="star5" title="5 star"></label>
            <input type="radio" <?php compareValue(4, $item->getRate(), ' checked ') ?> id="star4" name="rate" value="4" /><label for="star4" title="4 star"></label>
            <input type="radio" <?php compareValue(3, $item->getRate(), ' checked ') ?> id="star3" name="rate" value="3" /><label for="star3" title="3 star"></label>
            <input type="radio" <?php compareValue(2, $item->getRate(), ' checked ') ?> id="star2" name="rate" value="2" /><label for="star2" title="2 star"></label>
            <input type="radio" <?php compareValue(1, $item->getRate(), ' checked ') ?> id="star1" name="rate" value="1" /><label for="star1" title="1 star"></label>
        </div>

        <?php showErrorSessionValue('error:item:rate:correct') ?>

        <input type="hidden" name="id" value="<?php echo $item->getId(); ?>">

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Edytuj film</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>