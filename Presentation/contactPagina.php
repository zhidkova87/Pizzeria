<?php
require_once("header.php");
?>
<section class="container ">
    <div class="row my-5 p-5 bg-light">
        <div class="mb-4">
            <h5>Contacteer ons:</h5>
        </div>
        <div class="col-lg-6 text-center border-end p-3">
            <div class="text-start ">
                <p><b>Adres:</b> Nepstraat 25, 9000 Gent</p>
                <p><b>Telefoonnummer:</b> +1284596854</p>
                <p><b>Email: </b><a href="mailto:pizzeria@gmail.be">pizzeria@gmail.be</a></p>
            </div>
        </div>
        <div class="col-lg-6">
           <form class="p-3" action="contact.php" method="post">
               <div class="mb-3">
                   <label for="inputNaam" class="form-label">Naam*</label>
                   <input type="text" class="form-control" name="txtNaam" id="inputNaam" placeholder="Naam" required>
               </div>
               <div class="mb-3">
                   <label for="inputEmail" class="form-label">Email*</label>
                   <input type="text" class="form-control" name="txtEmail" id="inputEmail" placeholder="Email" required>
               </div>
               <div class="mb-3">
                   <label for="inputOnderwerp" class="form-label">Onderwerp*</label>
                   <input type="text" class="form-control" name="txtOnderwerp" id="inputOnderwerp" placeholder="Onderwerp" required>
               </div>
               <div class="mb-3">
                   <label for="inputBericht" class="form-label">Bericht*:</label>
                   <textarea class="form-control" name="txtBericht" id="inputBericht" placeholder="Schrijf hier uw bericht" required></textarea>
               </div>
               <div class="text-center">
                   <button class="btn btn-dark btn-sm" name="btnVerstuur">Verstuur</button>
               </div>
               <?php if($melding) { ?>
                   <span><?php echo $melding; ?></span>
               <?php } ?>
           </form>
        </div>
    </div>

</section>

<?php
require_once ("footer.php");
?>
