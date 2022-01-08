<?php
declare(strict_types=1);
require_once("header.php");
?>
<section class="container py-5">
    <?php foreach ($producten as $product) { ?>
        <div class="card border-secondary mb-4">
            <form action="menuPagina.php" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="../img/<?php echo $product->getFoto();?>" alt="<?php echo $product->getNaam();?>" width="200">
                    </div>
                    <div class="col-lg-6 py-4">
                        <h5><?php echo $product->getNaam();?></h5>
                        <p><?php echo $product->getOmschrijving();?></p>
                    </div>
                    <div class="col-lg-2 py-4">
                        <h5><?php echo $product->getPrijs() . " €";?></h5>
                    </div>
                    <div class="col-lg-2 p-4 text-end">
                         <input type="submit" name="btnToevoegen" value="In winkelmandje" id="<?php echo $product->getProductId();?>" ">
                    </div>

                </div>
            </form>
        </div>
    <?php } ?>
</section>



<?php
require_once("footer.php");
?>
