<!-- NAVIGATION -->

<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <?php foreach ($navigation as $item => $link): ?>
                    <li <?php if ($_SERVER['REQUEST_URI'] === $link): ?> class='active' <?php endif; ?>>
                        <a href='<?= $link; ?>'><?= $item; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->