<?php $_SESSION['title'] = "Dodaj film"; ?>
<?php $_SESSION['css']  = 'item' ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Dodaj film</h1>

    <form action="./index.php?action=addItem" method="post">
        <div class="form-group">
            <label>Nazwa filmu</label>
            <input type="text" class="form-control" name="title" value='<?php echo showSessionValue('memory:item:title:value'); ?>'>
        </div>

        <?php showErrorSessionValue('error:item:title:strlen') ?>

        <!-- == () == -->

        <div class="form-group">
            <label>Adres obrazka</label>
            <input type="text" class="form-control" name="image_src" value='<?php echo showSessionValue('memory:item:image_src:value'); ?>'>
        </div>

        <?php showErrorSessionValue('error:item:image_src:strlen') ?>

        <!-- == () == -->

        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" rows="20" name="desctiption"><?php echo showSessionValue('memory:item:desctiption:value'); ?></textarea>
        </div>

        <?php showErrorSessionValue('error:item:desctiption:strlen') ?>

        <!-- == () == -->

        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
            <input type="radio" id="star10" name="rate" value="10" /><label for="star10" title="10 star"></label>
            <input type="radio" id="star9" name="rate" value="9" /><label for="star9" title="9 star"></label>
            <input type="radio" id="star8" name="rate" value="8" /><label for="star8" title="8 star"></label>
            <input type="radio" id="star7" name="rate" value="7" /><label for="star7" title="7 star"></label>
            <input type="radio" id="star6" name="rate" value="6" /><label for="star6" title="6 star"></label>
            <input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="5 star"></label>
            <input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="4 star"></label>
            <input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="3 star"></label>
            <input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="2 star"></label>
            <input type="radio" id="star1" name="rate" value="1" checked /><label for="star1" title="1 star"></label>
        </div>

        <?php showErrorSessionValue('error:item:rate:correct') ?>


        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Dodaj film</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>