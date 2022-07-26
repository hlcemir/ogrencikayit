// asdashduqhwoıdu
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<script>	$('#blogCarousel').carousel({
        interval: 3000
    });</script>

<header>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <H2>Öğrenci Portal</H2>
    </div>
</header>
<main>
    <div class="container login-container">
        <div class="row">

            <?
                require_once "baglan.php";
                global $baglan;
            ?>

            <? if(isset($_SESSION['Kemail']) && !empty($_SESSION['Kemail'])){ ?>

                <div class="col-md-6 login-form-1 mt-5">
                    <div class="card-header bg-success">
                        <h3>Giriş yaptınız, hoş geldiniz sayın <?php echo $_SESSION['Kadisoyadi']; ?>.</h3>
                    </div>
                </div>
            <? } else { ?>

                <div class="col-md-6 login-form-1 mt-5">
                    <div class="card-header bg-success">
                        <h3>Öğrenci Giriş</h3>
                    </div>
                    <div class="card-body">
                        <?php


                        if ($_POST){
                            $GirisEmail = $_POST['gelemail'];
                            $GirisSifre = sha1(md5($_POST['gelsifre']));

                            if ($GirisEmail !="" and $GirisSifre !=""){

                                $q = $baglan->prepare("SELECT * FROM users WHERE Email = ? and Sifre = ?");
                                $q->execute(array($GirisEmail,$GirisSifre));
                                if ($d=$q->fetchAll()){
                                    foreach($d as $k=>$v) {

                                        $_SESSION['Kemail']=$GirisEmail;
                                        $_SESSION['Kadisoyadi']=$v["AdiSoyadi"];


                                        echo'<div class="alert alert-success">Giriş işlemi başarılı !</div>';

                                        header("refresh:2 , url=giris.php");

                                        break;
                                    }
                                }else{
                                    echo'<div class="alert alert-danger">Bu bilgilere ait kullanıcı bulunamadı !</div>';

                                }

                            }else{
                                echo'<div class="alert alert-danger">Lütfen Tüm Alanları Doldurunuz!</div>';
                            }

                        }else{

                        }




                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="Email">E-mail Adresiniz</label>
                                <input type="email" class="form-control mt-2" name="gelemail" />
                            </div>
                            <div class="form-group">
                                <label for="Sifre">Şifreniz</label>
                                <input type="password" class="form-control" name="gelsifre" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit btn btn-success" value="Giriş" />
                            </div>
                        </form>
                        <a href="kayit.php"><button class="btn btn-primary mt-2">Kayıt Ol!</button></a>
                    </div>
                </div>


            <? } ?>
            <div class="col mt-5 ml-5">
                <a href="https://www.osym.gov.tr" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/%C3%96SYM.svg/1280px-%C3%96SYM.svg.png" alt="ösym" width="500" height="300"></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div id="Carousel" class="carousel slide">

                    <ol class="carousel-indicators">
                        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#Carousel" data-slide-to="1"></li>
                        <li data-target="#Carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="row">
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/tr/thumb/f/f4/K%C4%B1r%C4%B1kkale_%C3%BCniversitesi_yeni_logosu.jpeg/640px-K%C4%B1r%C4%B1kkale_%C3%BCniversitesi_yeni_logosu.jpeg" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/tr/e/e2/Bo%C4%9Fazi%C3%A7i_%C3%9Cniversitesi_Logo.png" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/tr/archive/5/5f/20200406212436%21Ankara_%C3%9Cniversitesi_logosu.png" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://samsun.edu.tr/wp-content/uploads/2019/09/mavi-samsun-universitesi-logo-3.png" alt="Image" style="max-width:100%;"></a></div>
                            </div><!--.row-->
                        </div><!--.item-->

                        <div class="item">
                            <div class="row">
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/tr/archive/5/5f/20200406212436%21Ankara_%C3%9Cniversitesi_logosu.png" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="https://www.usak.edu.tr/Images/logolarimiz/yeni_1.png" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://depo.btu.edu.tr/dosyalar/btu/Dosyalar/TR%20LOGO(1).jpg" alt="Image" style="max-width:100%;"></a></div>
                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://w3.bilkent.edu.tr/logo/tr-amblem.png" alt="Image" style="max-width:100%;"></a></div>
                            </div><!--.row-->
                        </div><!--.item-->
                    </div>
                    <!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                </div><!--.Carousel-->

            </div>
        </div>
    </div><!--.container-->

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Duyurular</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">1.Duyuru</li>
                            <li class="list-group-item">2.Duyuru</li>
                            <li class="list-group-item">3.Duyuru</li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        Son Güncelleme Tarihi: 21.07.2022
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Kayıtlı Kullanıcı Sayısı</h5>
                        <p class="card-text" style="text-align: center">#######</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Duyuru Sayısı</h5>
                        <p class="card-text" style="text-align: center">##########</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">?</h5>
                        <p class="card-text" style="text-align: center">#########</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<footer>
    <div class="text-center p-3 mt-5" style="background-color: rgba(0, 0, 0, 0.2);">
        <p>© 2022 Copyright: Emircan Halıcı</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>