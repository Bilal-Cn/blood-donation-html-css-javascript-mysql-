<?php
class Veritabani
{

    private $baglanti;
    public function __construct()
    {
        //Yapıcı metot
        //Veritabanı nesnesi ilk oluşturulduğunda bağlantı kurulur 
        $this->baglanti = mysqli_connect("localhost", "root", "", "VtHastane");
        //Türkçe karakter optimizasyonu sağlanır
        mysqli_set_charset($this->baglanti, 'utf8');
        session_start();
        //Ardından kullanıcının IP bilgisi alınmaya çalışır ve $ip değişkenine aktarılır
    }
    public function DiziDondur($query, $sutunlar)
    {
        $sonuc = $this->baglanti->query($query);
        $veriler = array();
        //Veri tabanında sorgu çalıştırılarak tüm sutun değerleri diziye aktarılır
        while ($satir = $sonuc->fetch_assoc()) {
            $dizi = array();
            for ($i = 0; $i < count($sutunlar); $i++) {
                array_push($dizi, $satir[$sutunlar[$i]]);
            }
            array_push($veriler, $dizi);
        }
        //Ardından dizi geri döndürülür
        return $veriler;
    }
    public function QueryCalistir($query)
    {
        //Bu metot, sadece bir query çalıştırır. Eğer hata verilirse hatayı sayfaya yazdırır
        if (!$this->baglanti->query($query)) {
            return false;
        } else return true;
    }
    public function HastaneKayit($ad, $sifre, $adres, $il, $ilce, $telefon)
    {
        if ($this->QueryCalistir("INSERT INTO hastane(ad,sifre,adres,il,ilce,telefon) VALUES('$ad','$sifre','$adres',$il,$ilce,'$telefon')")) {
            $_SESSION['kgiris'] = null;
            $_SESSION['hgiris'] = $this->Giris($ad, $sifre, 'hastane');
            header("Location: index.php?KayitBasarili");
        } else header("Location: index.php?KayitBasarisiz");
    }
    public function KullaniciKayit($kadi, $sifre, $ad, $soyad, $adres, $il, $ilce, $kangrubu, $ilac, $sigara, $alkol)
    {
        if ($this->QueryCalistir("INSERT INTO kullanici(kullaniciadi,sifre,ad,soyad,adres,il,ilce,kangrubu,ilac,sigara,alkol) 
    VALUES('$kadi','$sifre','$ad','$soyad','$adres',$il,$ilce,'$kangrubu','$ilac',$sigara,$alkol)")) {
            $_SESSION['hgiris'] = null;
            $_SESSION['kgiris'] = $this->Giris($ad, $sifre, 'kullanici');
            header("Location: index.php?KayitBasarili");
        } else header("Location: index.php?KayitBasarisiz" . $this->baglanti->error);
    }
    public function Giris($kadi, $sifre, $tip)
    {
        $query = "";
        if ($tip == 'kullanici') {
            $query = "SELECT * FROM kullanici WHERE kullaniciadi='$kadi' AND sifre='$sifre'";
        } else {
            $query = "SELECT * FROM hastane WHERE ad='$kadi' AND sifre='$sifre'";
        }
        $sonuc = $this->baglanti->query($query);
        if ($veri = $sonuc->fetch_assoc()) {
            return $veri;
        } else return null;
    }
    public function Cikis()
    {
        session_destroy();
    }
    public function IlGetir($ilno)
    {
        $sonuc = $this->baglanti->query("SELECT isim FROM il WHERE il_no=$ilno");
        if ($satir = $sonuc->fetch_assoc()) {
           return $satir['isim'];
        }
    }
    public function IlceGetir($ilceno)
    {
        $sonuc = $this->baglanti->query("SELECT isim FROM ilce WHERE ilce_no=$ilceno");
        if ($satir = $sonuc->fetch_assoc()) {
           return $satir['isim'];
        }
    }
    public function BulteneAktar($kid,$telefon)
    {
        $kullanici = $this->DiziDondur("SELECT * FROM kullanici WHERE id=$kid",array("ad","soyad","kangrubu","adres"));
        $kangrubu = $kullanici[0][2];
        $adres = $kullanici[0][3];
        $this->QueryCalistir("UPDATE bulten SET ad='".$kullanici[0][0]." ".$kullanici[0][1]."',kangrubu='$kangrubu',adres='$adres',telefon='$telefon'");
        header("Location: index.php?Bultenguncellendi");
    }
    public function Bulten(){
        $sonuc = $this->baglanti->query("SELECT * FROM bulten");
        if ($satir = $sonuc->fetch_assoc()) {
           return $satir;
        }
    }
}
