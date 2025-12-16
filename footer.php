<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/** Ajuste se necessário */
$BASE_PATH = '/';
?>
<footer class="footer main-bg text-center py-4 mt-5">
    <div class="container">
        <div class="mb-3">
            <a href="#" class="mx-2"><img width="32" src="https://img.icons8.com/color/30/instagram-new--v1.png" alt="instagram" class="rounded-circle"></a>
            <a href="#" class="mx-2"><img width="32" src="https://img.icons8.com/color/30/facebook.png" alt="facebook" class="rounded-circle"></a>
            <a href="#" class="mx-2"><img width="32" src="https://img.icons8.com/ios-filled/30/ffffff/twitterx--v2.png" alt="twitterx" class="rounded-circle"></a>
        </div>
        <small class="text-white-50">ISCAC Burguer &copy; <?= date('Y') ?> • Sabor que move o campus</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>