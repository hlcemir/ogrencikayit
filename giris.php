<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Sistem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>

<header>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <H2>Öğrenci Portal</H2>
            <div class="col" style="text-align: right">
                <a href="cikis.php"><button class="btn btn-danger">Çıkış Yap</button></a>
            </div>
            <div class="col" style="text-align: left">

            </div>
    </div>
</header>
<main>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?
                require_once "baglan.php";
                global $baglan;
                session_start();
                ?>
                <h3> <strong>Giriş yaptın</strong> , hoş geldin <?php echo $_SESSION['Kadisoyadi']; ?></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Ders Saati</th>
                        <th scope="col">Pazartesi</th>
                        <th scope="col">Salı</th>
                        <th scope="col">Çarşamba</th>
                        <th scope="col">Perşembe</th>
                        <th scope="col">Cuma</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Duyurular</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            $q = $baglan->prepare("SELECT * FROM duyurular WHERE aktifmi = ?");
                            $q->execute(array(1));
                            if ($d=$q->fetchAll()) {
                                foreach ($d as $k => $v) {


                                    echo '<li class="list-group-item"><a href="#myModal"  data-toggle="modal" data-target="#myModal">' . $v["baslik"] . '</a></li>';

                                }
                            }

                            ?>

                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        Son Güncelleme Tarihi: 21.07.2022
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>