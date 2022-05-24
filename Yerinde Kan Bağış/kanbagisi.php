<?php
require 'vt.php';
$vt = new Veritabani();
if (!isset($_SESSION['hgiris'])) {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Kan Bağışı</title>
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
                <?php
                $durum = "";
                if (isset($_GET['durum'])) {
                    switch ($_GET['durum']) {
                        case 'bos':
                            $durum = "Boş alan bırakmayınız!";
                            break;
                        case 'ok':
                            $durum = "Bağış eklenmiştir!";
                            break;

                        default:
                            # code...
                            break;
                    }
                }
                echo '<h3 class="bilgi">' . $durum . '</h3>';
                ?>

                <img src="img/bagis.jpg" alt="">
            </div>
            <div class="kayitOl-right d-flex flex-column justify-content-between">
                <div class="fields">
                    <div class="field-wrapper d-flex align-items-center">
                        <label>Kullanıcı seçin</label>
                        <select name="kullanici">
                            <?php foreach ($vt->DiziDondur("SELECT * from kullanici order by ad asc", array("id", "kullaniciadi")) as $key) {
                                echo '<option value="' . $key[0] . '">' . $key[1] . '</option>';
                            } ?>

                        </select>
                    </div>
                    <div class="field-wrapper">
                        <select name="kangrubu">
                            <option  value="A+">A+</option>
                            <option selected value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="0+">0+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="0-">0-</option>
                        </select>
                    </div>
                    <div class="field-wrapper">
                        <input type="text" name='bagis_miktari'>
                        <div class="field-placeholder">
                            <span>Bağış miktarını litre cinsinden giriniz...</span>
                        </div>
                    </div>

                </div>
                <input type="submit" class="kayitol-Btn" value="Bağış ekle" name="kanbagisi">
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>