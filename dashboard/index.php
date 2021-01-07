<?php include('../template/_header.php') ?>
<?php include('../template/_navbar.php') ?>

<!-- Page Content -->
<div class="container">
    <div class="info"></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="jumbotron">
                <h1 class="display-4">Hello, <?= $_SESSION['name'] ?></h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
            </div>
        </div>
    </div>
</div>

<?php include('../template/_footer.php') ?>