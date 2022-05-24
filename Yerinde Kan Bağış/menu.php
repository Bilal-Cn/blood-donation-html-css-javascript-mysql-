<div class="container-fluid">

    <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        if (isset($_SESSION['kgiris']) || isset($_SESSION['hgiris'])) {
        ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <?php if (isset($_SESSION['hgiris'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="bulten.php">İhtiyaç Bülteni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mesajlar.php?id=<?php echo $_SESSION['hgiris']['id'] ?>">Mesajlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="haberpaylas.php">Haber Paylaş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kanbagisi.php">Kan bagışı ekle</a>
                    </li>
                <?php
                } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="mesajlar.php?id=<?php echo $_SESSION['kgiris']['id'] ?>">Mesajlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bilgilerim.php?id=<?php echo $_SESSION['kgiris']['id'] ?>">Bilgilerim</a>
                    </li>

                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="cikis.php">Çıkış</a>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="giris.php">Giriş</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kayitOl.php">Kullanıcı Kayıt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hastaneKayit.php">Hastane Kayıt</a>
                </li>
            </ul>
        <?php
        }
        ?>
        <form class="form-inline my-2 my-lg-0">
            <a href="hastaneler.php">Kayıtlı Hastaneler</a>
            <a href="hakkimizda.php">Hakkımızda</a>
            <a href="iletisim.php">İletişim</a>
        </form>
    </div>
</div>