<?php
require_once ("header.php");
?>
<section class="container bg-light text-center p-4">
        <h4>Bestelling overzicht</h4>
        <div class="row p-3 text-center">
            <div class="col-lg-6 border-end">
                <h5>Producten</h5>
                <br/>
                <?php
                $total = 0;
                foreach ($_SESSION["winkelmandje"] as $key => $value) { ?>
                <div class="row ps-5">
                    <div class="col-lg-6 text-start">
                        <h6><?php echo $value . " x " . $productSvc->haalProductOp($key)->getNaam();?></h6>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        $promo = $klant->isPromo();
                        if($promo === true) { ?>
                                <span style="color: blue">Promo prijs:</span>
                            <span>€<?php echo " " . $sub = $value * $productSvc->haalProductOp($key)->getPromoprijs();?></span>
                        <?php } else { ?>
                        <p>€<?php echo " " . $sub = $value * $productSvc->haalProductOp($key)->getPrijs();?></p>
                        <?php } ?>
                    </div>
                </div>
                    <br/>
                    <?php
                    $total += $sub;
                } ?>
                <h6>Total: €<?php echo " " . $total;?></h6>
            </div>
            <div class="col-lg-6">
                <h5>Klant gegevens</h5>
                <br/>
                <div class="row ps-5 ">
                    <div class="col-lg-6 text-start">
                        <h6><?php echo $klant->getFamilienaam() . " " . $klant->getVoornaam();?></h6>
                        <?php if($klant->getAdres()->getBus() === "") { ?>
                            <span><?php echo $klant->getAdres()->getStraat() . " " . $klant->getAdres()->getHuisnummer();?></span><br/>
                        <?php } else { ?>
                        <span><?php echo $klant->getAdres()->getStraat() . " " . $klant->getAdres()->getHuisnummer() . "/" . $klant->getAdres()->getBus();?></span><br/>
                        <?php } ?>
                        <span><?php echo $klant->getAdres()->getPlaats()->getPostcode() . " " . $klant->getAdres()->getPlaats()->getGemeente();?>
                    </div>
                    <div class="col-lg-6 text-end">
                        <form action="afrekenen.php" method="post">
                            <button class="btn btn-secondary btn-sm" name="btnBewerken">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                            </button>
                        </form>
                    </div>
                </div>
                    </span><br/>
                    <div class="row justify-content-center ps-5">
                        <form action="afrekenen.php" method="post">
                            <div class="col-lg-10 text-start mt-4">
                                <label for="inputOpmerkingen">Aanvullende informatie</label><br/>
                                <textarea name="txtOpmerking" id="inputOpmerkingen" cols="60"></textarea>
                            </div>
                            <div class="row justify-content-end">
                                <button class="col-lg-4 btn btn-secondary btn-sm m-3" name="btnWinkelmandje">Bestelling bewerken</button>
                                <button class="col-lg-4 btn btn-secondary btn-sm m-3" name="btnAfrekenen">Bestelling plaatsen</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>



</section>


<?php
require_once ("footer.php");
?>
