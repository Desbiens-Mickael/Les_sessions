<?php
session_start();
if (!isset($_SESSION['loginname'])) {
    header('Location: login.php');
}
require 'inc/head.php';
require 'inc/data/products.php';

?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <?php if (in_array($id, $_SESSION['cart'])) : ?>
                <?php $quantity = []; ?>
                <?php foreach($_SESSION['cart'] as $cart){
                    if($cart == $id){
                        $quantity[]= $cart;
                    }
                }?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $cookie['name']; ?></h3>
                            <p><?= $cookie['description']; ?></p>
                            <p>Quantitée : <?= count($quantity);?> </p>
                        </figcaption>
                    </figure>
                </div>
            <?php endif; ?>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>