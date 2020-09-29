<?php $_SESSION['title'] = "Zasób nie istnieje"; ?>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="px-4 py-3">
    <h1>Wystąpił nieoczekiwany błąd</h1>
    <p class="text-center">Zasób do którego próbujesz otrzymać dostęp nie istnieje.</p>
    <p class="text-center">Kliknij <a href="index.php?action=start">tutaj</a>, aby przejść do strony głównej.</p>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>