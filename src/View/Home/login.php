<!-- HEADER -->
<?php
include_once __DIR__ . '/../Components/header.php';
?>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-offset-4 col-md-3">
                <div class="section-title text-center">
                    <h3 class="title">Login</h3>
                </div>
                <form action="/login" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="input" value="<?= $_POST['email'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="input">
                    </div>
                    <div class="form-group">
                        <p class="has-error danger"><?= $errorMessage ?></p>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="primary-btn" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<?php include_once __DIR__ . '/../Components/footer.php'; ?>
<!-- /FOOTER -->