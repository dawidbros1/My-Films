<?php $_SESSION['title'] = "Wymagane logowanie"; ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Wystąpił nieoczekiwany błąd</h1>
    <p class="text-center">Aby otrzymać dostęp do tego zasobu należy zalogować się.</p>
    <p class="text-center">Kliknij <a href="index.php?action=login">tutaj</a>, aby przejść do formularza logowania.</p>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>