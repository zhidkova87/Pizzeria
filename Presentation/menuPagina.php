<?php
declare(strict_types=1);
require_once("header.php");
?>
<section class="container">
    <div class="row justify-content-around">
    <article class="col-lg-8 px-2">
            <?php foreach ($producten as $product) { ?>
                <div class="border-top bg-light ">
                    <form action="menu.php?productId=<?php echo $product->getProductId();?>" method="post" class="mb-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="../img/<?php echo $product->getFoto();?>" alt="<?php echo $product->getNaam();?>" width="200">
                            </div>
                            <div class="col-lg-5 py-2" id="card">
                                <h5><?php echo $product->getNaam();?></h5>
                                <p><?php echo $product->getOmschrijving();?></p>
                            </div>
                            <div class="col-lg-1 py-4">
                                <h5><?php echo $product->getPrijs() . " €";?></h5>
                            </div>
                            <div class="col-lg-3 p-4 text-end">
                                <button class="btn btn-outline-dark btn-sm" name="btnToevoegen" value="<?php echo $product->getProductId();?>">In winkelmandje</button>
                            </div>

                        </div>
                    </form>
                </div>
            <?php } ?>
    </article>
    <aside class="col-lg-4 text-center bg-light p-3 border-start">
        <h4>Winkelmandje:</h4>
        <br/>
             <?php
             $total = 0;
             if(!empty($_SESSION["winkelmandje"])) {
             foreach ($_SESSION["winkelmandje"] as $key => $value) { ?>
                <div class="row p-3 text-start">
                    <div class="col-6">
                        <h6><?php echo $value . " x " . $productSvc->haalProductOp($key)->getNaam();?></h6>
                    </div>
                 <div class="col-3">
                     <form action="menu.php" method="post">
                         <button class="btn btn-outline-dark btn-sm" name="btnMin" value="<?php echo $key;?>">-</button>
                         <button class="btn btn-outline-dark btn-sm" name="btnPlus" value="<?php echo $key;?>">+</button>
                     </form>
                 </div>
                    <div class="col-3 text-end">
                        <p>€<?php echo " " . $sub = $value * $productSvc->haalProductOp($key)->getPrijs();?></p>
                    </div>
                </div>
             <?php
             $total += $sub;
             } ?>
        </br>
        <div class="text-center">
            <h6>Total: €<?php echo " " . $total;?></h6>
        </div>
        <form action="menu.php" method="post">
            <button class="btn btn-dark btn-sm" name="btnAfrekenen">Afrekenen</button>
        </form>
        <?php } else {?>
            <h6>Uw winkelmandje is leeg.</h6>
        <?php } ?>

    </aside>
    </div>
</section>





<?php
require_once("footer.php");
?>
