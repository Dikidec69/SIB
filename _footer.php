<?php
require_once "_config/config.php";

if(!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
} ?>
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mas'ud Diki Setiawan 2023</span>
        </div>
    </div>
</footer>
</body>
</html> 