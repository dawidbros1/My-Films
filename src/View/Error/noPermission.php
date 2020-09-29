<?php $_SESSION['title'] = "Brak uprawnień"; ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Wystąpił nieoczekiwany błąd</h1>
    <p class="text-center">Nie posiadasz uprawnień do korzystania z tego zasobu.</p>
    <p class="text-center">Kliknij <a href="index.php?action=start">tutaj</a>, aby przejść do strony głównej.</p>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>