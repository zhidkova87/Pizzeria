<?php
require_once ("header.php");
?>
<section class="container">
    <div class="row justify-content-center p-5">
        <form class="col-lg-8 bg-light" action="profiel.php" method="post" id="gegevens">
            <div class="text-center">
                <h5>Persoonlijke gegevens</h5>
            </div>
            <div class="mt-5 mb-3">
                <label for="inputFamilienaam" class="form-label">Familienaam</label>
                <input type="text" class="form-control" name="txtFamilienaam" id="inputFamilienaam" value="<?php echo $klant->getFamilienaam();?>">
            </div>
            <div class="mb-3">
                <label for="inputVoornaam" class="form-label">Voornaam</label>
                <input type="text" class="form-control" name="txtVoornaam" id="inputVoornaam" value="<?php echo $klant->getVoornaam();?>">
            </div>
            <div class="mb-3">
                <label for="inputStraat" class="form-label">Straat</label>
                <input type="text" class="form-control" name="txtStraat" id="inputStraat" value="<?php echo $klant->getAdres()->getStraat();?>">
            </div>
            <div class="mb-3">
                <label for="inputHuisnummer" class="form-label">Huisnummer:</label>
                <input type="text" class="form-control" name="txtHuisnummer" id="inputHuisnummer" value="<?php echo $klant->getAdres()->getHuisnummer();?>">
            </div>
            <div class="mb-3">
                <label for="inputBus" class="form-label">Bus</label>
                <input type="text" class="form-control" name="txtBus" id="inputBus" value="<?php echo $klant->getAdres()->getBus();?>">
            </div>
            <div class="mb-3">
                <label for="inputPlaats" class="form-label"></label>
                <select name="postcode" id="inputPlaats" required>
                    <option value="<?php echo $klant->getAdres()->getPlaats()->getPlaatsId();?>"><?php echo $klant->getAdres()->getPlaats()->getPostcode() ." " .$klant->getAdres()->getPlaats()->getGemeente();?></option>
                    <?php foreach ($plaatsen as $plaats) { ?>
                        <option value="<?php echo $plaats->getPlaatsId();?>"><?php echo $plaats->getPostcode() . " " . $plaats->getGemeente();?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputTelefoonnummer" class="form-label">Telefoonnummer</label>
                <input type="text" class="form-control" name="txtTelefoonnummer" id="inputTelefoonnummer" value="<?php echo $klant->getTelefoonnummer();?>">
            </div>
            <div class="mb-3">
                <label for="inputOpmerking" class="form-label">Opmerkingen</label>
                <textarea class="form-control" name="txtOpmerking" id="inputOpmerking" aria-describedby=""></textarea>
            </div>
            <div class="mb-5">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="txtEmail" id="inputEmail" value="<?php echo $klant->getEmail();?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-sm" name="btnBewerken">Bewerken</button>
            </div>
        </form>
    </div>
</section>

<?php
require_once ("footer.php");
?>
