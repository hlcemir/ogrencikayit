<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Sistem</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<header>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <H2>Öğrenci Kayıt Sistemi</H2>
    </div>
</header>
<main>
<div class="container">
    <div class="col-md-6 login-form-1 mt-5">
        <div class="card-header bg-primary">
            <h4>Kayıt Ol!</h4>
        </div>
        <div class="card-body">
            <?php
            require "baglan.php";
            global $baglan;

            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL);

            if ($_POST){

                $GelenAd=$_POST['adsoyad'];
                $GelenEmail=$_POST['email'];
                $GelenSifre=$_POST['sifre'];
                $GelenSifre2=$_POST['sifre2'];

                if (isset($_POST['onay'])){
                    $GelenOnay=$_POST['onay'];
                }else{
                    $GelenOnay="";
                }
                if ($GelenOnay!=""){

                    if ($GelenAd!="" and $GelenSifre !="" and $GelenSifre2!="" and $GelenEmail!=""){
                        if ($GelenSifre == $GelenSifre2){

                            $GelenEmailSorgusu=$baglan->prepare("SELECT * FROM users where email=? LIMIT 1");
                            $GelenEmailSorgusu->execute([$GelenEmail]);
                            $GelenEmailSorgusuSayisi = $GelenEmailSorgusu->rowCount();
                            if ($GelenEmailSorgusuSayisi > 0 ){
                                echo'<div class="alert alert-danger">E-mail Adresi Kullanılıyor !</div>';
                            }else{
                                $KayıtSorgusu = $baglan->prepare("INSERT INTO users(AdiSoyadi,Email,Sifre,UyelikSözlesmesi) VALUES(?,?,?,?)");
                                $KayıtSorgusu->execute([$GelenAd,$GelenEmail,sha1(md5($GelenSifre)),$GelenOnay]);
                                $KayıtSorgusuSayisi = $KayıtSorgusu->rowCount();
                                if ($KayıtSorgusuSayisi > 0){
                                    echo '<div class="alert alert-success">Kayıt Başarılı! Yönlendiriliyorsunuz ..</div>';
                                    header('Refresh:2; index.php');

                                }else{
                                    echo '<div class="alert alert-alert">Kayıt İşlemi Sırasında Hata, Tekrar Deneyiniz ! </div>';
                                }
                            }

                        }else{
                            echo '<div class="alert alert-danger">Şifreler Uyuşmuyor !</div>';

                        }
                    }else{
                        echo '<div class="alert alert-danger">Lütfen Boşlukları Doldurun !</div>';

                    }

                }else{
                    echo '<div class="alert alert-danger">Üyelik Sözleşmesini Onaylamadınız !</div>';
                }

            }

            ?>
            <form method="post">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input type="text" name="adsoyad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Email Adresi</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Sifre">Şifreniz</label>
                    <input type="password" name="sifre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Sifre2">Tekrar Şifre</label>
                    <input type="password" name="sifre2" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="onay" value="1" checked> <a class="text-warning" href="#">Üyelik Sözleşmesini</a> okudum kabul ediyorum.
                </div>
                <button class="btn btn-primary" type="submit">Kayıt Ol!</button>
            </form>
        </div>
    </div>
</div>
</main>
<footer>
    <div class="text-center p-3 mt-5" style="background-color: rgba(0, 0, 0, 0.2);">
        <p>© 2022 Copyright: Emircan Halıcı</p>
    </div>
</footer>
</body>
</html>