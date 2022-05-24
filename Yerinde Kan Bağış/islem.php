<?php
require 'vt.php';
$vt = new Veritabani();
if(isset($_POST['kgiris'])){
    $giris=$vt->Giris($_POST['kadi'],$_POST['sifre'],'kullanici');
    if($giris!=null){
        $_SESSION['hgiris']=null;
        $_SESSION['kgiris']=$giris;
        header("Location: index.php?GirisBasarili");
    }
    else header("Location: giris.php?HataliGiris");
}
else if(isset($_POST['hgiris'])){
    $giris=$vt->Giris($_POST['kadi'],$_POST['sifre'],'hastane');
    if($giris!=null){
        $_SESSION['hgiris']=$giris;
        $_SESSION['kgiris']=null;
        header("Location: index.php?GirisBasarili");
    }
    else header("Location: giris.php?HataliGiris");
}
if(isset($_POST['hastanekayit'])){
    $vt->HastaneKayit($_POST['ad'],$_POST['sifre'],$_POST['adres'],$_POST['il'],$_POST['ilce'],$_POST['telefon']);
}
if(isset($_POST['kullanicikayit'])){
    $vt->KullaniciKayit($_POST['kadi'],$_POST['sifre'],$_POST['ad'],$_POST['soyad'],$_POST['adres']
    ,$_POST['il'],$_POST['ilce'],$_POST['kangrubu'],$_POST['ilac'],$_POST['sigara'],$_POST['alkol']);
}   
foreach ($vt->DiziDondur("SELECT id FROM kullanici",array("id")) as $id) {
    if(isset($_POST[$id[0]])){
        $vt->BulteneAktar($id[0],$_SESSION['hgiris']['telefon']);
        break;
    }
}
if(isset($_POST['mesajgonder'])){
    $mesaj = $_POST['mesaj'];
    $kullanici_id = $_POST['kullanici_id'];
    $mesaj_birim = $_POST['mesaj_birim'];
    $mesaj_gonderen_id = $_POST['mesaj_gonderen_id'];
    $vt->QueryCalistir("INSERT INTO mesajlar(mesaj,gonderilmezamani,mesaj_gonderilen_id,mesaj_gonderen_id,mesaj_birim) VALUES ('$mesaj',CURDATE(),'$kullanici_id','$mesaj_gonderen_id','$mesaj_birim')");
    header("Location: index.php?MesajGonderildi");
}
if(isset($_POST['haberpaylas'])){
    $haber_baslik = $_POST['haber_baslik'];
    $haber_icerik = $_POST['haber_icerik'];
    $haber_id = $_SESSION['hgiris']['id'];
   if($vt->QueryCalistir("INSERT INTO haberler(haber_baslik,haber_icerik,haber_hastane) VALUES('$haber_baslik','$haber_icerik','$haber_id')"))
     header("Location: haberpaylas.php?durum=ok");  
    else
    header("Location: haberpaylas.php?durum=no");  
}
if(isset($_POST['kanbagisi'])){
    $id = $_POST['kullanici'];
    $miktar = $_POST['bagis_miktari'];
    $kangrubu = $_POST['kangrubu'];
    if($id!= "" and $miktar!= "" and $kangrubu!=""){
        $vt->QueryCalistir("INSERT INTO kanbagisi (kanveren_id,kan_litre,verilen_kangrubu) values ('$id','$miktar','$kangrubu')");
        header("Location: kanbagisi.php?durum=ok");  
    }
    else{
        header("Location: kanbagisi.php?durum=bos");  
    }
}