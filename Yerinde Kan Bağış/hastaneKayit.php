<?php
require 'vt.php';
$vt = new Veritabani();
if(isset($_SESSION['kgiris'])||isset($_SESSION['hgiris'])){
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="tr">

<head>
    <title>Hastane Kayıt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed">
        <?php include 'menu.php';?>
    </nav>
    <div class="hastaneKayit-section ">
        <div class="hastaneKayit-left">
            <form method="POST" action="islem.php">
                <div class="field-wrapper">
                    <input type="text" name='ad'>
                    <div class="field-placeholder">
                        <span>Hastane Adı</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='sifre'>
                    <div class="field-placeholder">
                        <span>Şifre</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='adres'>
                    <div class="field-placeholder">
                        <span>Adres</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <select name="il">
                       <?php 
                       foreach ($vt->DiziDondur("SELECT il_no,isim FROM il",array("il_no","isim")) as $sehir) {
                           ?>
                        <option value=<?php echo $sehir[0]; ?>><?php echo $sehir[1]; ?></option>
                           <?php
                       }
                       ?>
                    </select>
                </div>
                <div class="field-wrapper">
                    <select name="ilce">
                    <?php 
                       foreach ($vt->DiziDondur("SELECT ilce_no,isim FROM ilce",array("isim","ilce_no")) as $ilce) {
                           ?>
                        <option value=<?php echo $ilce[1]; ?>><?php echo $ilce[0]; ?></option>
                           <?php
                       }
                       ?>
                    </select>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='telefon'>
                    <div class="field-placeholder">
                        <span>Telefon</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="submit" class="hastaneKayit-Btn" value="KAYIT OL" name="hastanekayit">
                </div>
            </form>
        </div>
        <div class="hastaneKayit-right d-flex flex-column justify-content-between">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>