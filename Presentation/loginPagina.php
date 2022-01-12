<?php
declare(strict_types=1);
require_once("header.php");
?>
<section class="container">
    <div class="row m-5 bg-light">
        <div class="col-lg-6 col-sm-10 p-5 border-end">
            <form class="p-4" action="login.php?action=aanmelden" method="post">
                <div class="text-center">
                    <h5>Ik heb een account:</h5>
                    <?php if ($error) {?>
                        <span style="color: red"><?php echo $error;?></span>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                        <?php if(isset($_COOKIE["email"])) { ?>
                        <input type="email" class="form-control" name="txtEmail" id="inputEmail" value="<?php echo$_COOKIE["email"];?>">
                        <?php } else { ?>
                        <input type="email" class="form-control" name="txtEmail" id="inputEmail">
                        <?php } ?>
                </div>
                <div class="mb-3">
                    <label for="inputWachtwoord" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtWachtwoord" id="inputWachtwoord">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark btn-sm">Login</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-sm-10 p-5">
            <form class="p-4" action="login.php?action=registreren" method="post">
                <div class="text-center">
                <h5>Ik heb geen account:</h5>
                </div>
                <div class="mb-3">
                    <label for="inputFamilienaam" class="form-label">Familienaam</label>
                    <input type="text" class="form-control" name="txtFamilienaam" id="inputFamilienaam" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="inputVoornaam" class="form-label">Voornaam</label>
                    <input type="text" class="form-control" name="txtVoornaam" id="inputVoornaam">
                </div>
                <div class="mb-3">
                    <label for="inputStraat" class="form-label">Straat</label>
                    <input type="text" class="form-control" name="txtStraat" id="inputStraat" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="inputHuisnummer" class="form-label">Huisnummer:</label>
                    <input type="text" class="form-control" name="txtHuisnummer" id="inputHuisnummer">
                </div>
                <div class="mb-3">
                    <label for="inputBus" class="form-label">Bus</label>
                    <input type="text" class="form-control" name="txtBus" id="inputBus" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="inputPlaats" class="form-label"></label>
                    <select name="postcode" id="inputPostcode" required>
                        <option value="">--Selecteer gemeente--</option>
                        <?php foreach ($plaatsen as $plaats) { ?>
                            <option value="<?php echo $plaats->getPlaatsId();?>"><?php echo $plaats->getPostcode() . " " . $plaats->getGemeente();?></option>
                       <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTelefoonnummer" class="form-label">Telefoonnummer</label>
                    <input type="text" class="form-control" name="txtTelefoonnummer" id="inputTelefoonnummer" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="inputOpmerking" class="form-label">Opmerkingen</label>
                    <textarea class="form-control" name="txtOpmerking" id="inputOpmerking" aria-describedby=""></textarea>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="txtEmail" id="inputEmail" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="inputWachtwoord" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtWachtwoord" id="inputWachtwoord" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark btn-sm">Maak een account aan</button>
                </div>
            </form>
        </div>
    </div>
</section>


<?php
require_once("footer.php");
?>

