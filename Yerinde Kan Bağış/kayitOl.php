<?php
require 'vt.php';
$vt = new Veritabani();
if (isset($_SESSION['kgiris']) || isset($_SESSION['hgiris'])) {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Kayıt Ol</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed">
        <?php include 'menu.php'; ?>
    </nav>
    <div class="kayitOl-section ">
        <form method="POST" action="islem.php">
            <div class="kayitOl-left">

                <div class="field-wrapper">
                    <input type="text" name='kadi'>
                    <div class="field-placeholder">
                        <span>Kullanıcı Adı</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='sifre'>
                    <div class="field-placeholder">
                        <span>Şifre</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='ad'>
                    <div class="field-placeholder">
                        <span>Ad</span>
                    </div>
                </div>
                <div class="field-wrapper">
                    <input type="text" name='soyad'>
                    <div class="field-placeholder">
                        <span>Soyad</span>
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
                        foreach ($vt->DiziDondur("SELECT il_no,isim FROM il", array("il_no", "isim")) as $sehir) {
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
                        foreach ($vt->DiziDondur("SELECT ilce_no,isim FROM ilce", array("isim", "ilce_no")) as $ilce) {
                        ?>
                            <option value=<?php echo $ilce[1]; ?>><?php echo $ilce[0]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="field-wrapper">
                    <select name="kangrubu">
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="0+">0+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="0-">0-</option>
                    </select>
                </div>
            </div>
            <div class="kayitOl-right d-flex flex-column justify-content-between">
                <div class="fields">
                    <div class="field-wrapper">
                        <input type="text" name='ilac'>
                        <div class="field-placeholder">
                            <span>Düzenli Kullandığınız İlaç</span>
                        </div>
                    </div>
                    <div class="field-wrapper d-flex align-items-center">
                        <label>Sigara Kullanıyor musunuz?</label>
                        <select name="sigara">
                            <option value="0">Hayır</option>
                            <option value="1">Evet</option>
                        </select>
                    </div>
                    <div class="field-wrapper d-flex align-items-center">
                        <label>Alkol Kullanıyor musunuz?</label>
                        <select name="alkol">
                            <option value="0">Hayır</option>
                            <option value="1">Evet</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="kayitol-Btn" value="KAYIT OL" name="kullanicikayit">
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>