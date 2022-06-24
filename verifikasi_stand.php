<?php
    include 'koneksi.php'; //akses koneksi

    $id         = "";
    $foto       = "";
    $judul      = "";
    $ukuran     = "";
    $harga    = "";
    $sukses     = "";
    $error      = "";

    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if ($op == 'tolak') {
        $id         = $_GET['id'];
        $sqltolak  = "delete from stand where id_stand = '$id'";
        $qtolak    = mysqli_query($conn, $sqltolak);
        if ($qtolak) {
            $sukses = "Data berhasil ditolak";
        } else {
            $error  = "Data gagal ditolak!";
        }
    }

    if ($op == 'verifikasi') {
        $id         = $_GET['id'];
        $sqlverifikasi  = "insert into stand (STATUS) values ('Verified') where id_stand = '$id'";
        $qverifikasi    = mysqli_query($conn, $sqlverifikasi);
        if ($qverifikasi) {
            $sukses = "Data berhasil diverifikasi";
        } else {
            $error  = "Data gagal diverifikasi!";
        }
    }

    if ($error) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php
            header("refresh:5;url=verifikasi_stand.php");// refresh halaman data user
        }
        ?>
        <?php
        if ($sukses) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php
            header("refresh:5;url=verifikasi_stand.php");
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stand.in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .mx-auto {
            width: 1000px;
        }

        .card {
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <div class="header" style="text-align: center; padding: 20px;;">
        <h1>STAND.IN</h1>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header" style="font-weight:bold;">
                Verifikasi Stand
            </div>

        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary" style="font-weight:bold ;">
                List Data Permintaan Verifikasi
            </div>
            <div class="card-body">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">No</>
                            <th scope="col">ID Stand</>
                            <th scope="col">Foto</>
                            <th scope="col">Judul</>
                            <th scope="col">Ukuran</>
                            <th scope="col">Harga</>
                            <th scope="col">Pilih Aksi</>
                        </tr>
                    <tbody>
                        <?php
                        $sqlread = "select * from stand where status IS NULL order by id_stand asc";
                        $qread = mysqli_query($conn, $sqlread);
                        $urut = 1;

                        while ($read = mysqli_fetch_array($qread)) {
                            $id = $read['ID_USER'];
                            $foto = $read['FOTO_STAND'];
                            $judul = $read['JUDUL'];
                            $ukuran = $read['UKURAN'];
                            $harga = $read['HARGA_STAND'];

                        ?>
                            <tr>
                                <th scope="row"><?= $urut++ ?></th>
                                <td scope="row"><?= $id ?></td>
                                <td scope="row"><?= $foto ?></td>
                                <td scope="row"><?= $judul ?></td>
                                <td scope="row"><?= $ukuran ?></td>
                                <td scope="row"><?= $harga ?></td>
                                <td scope="row">
                                    <a href="verifikasi_stand.php?op=tolak&id=<?php echo $id ?>" onclick="return confirm('Tolak verifikasi stand ?')"><button type="button" class="btn btn-danger">Tolak</button></a>
                                    <a href="verifikasi_stand.php?op=verifikasi&id=<?php echo $id ?>" onclick="return confirm('Konfirmasi verifikasi stand ?')"><button type="button" class="btn btn-success">Verifikasi</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>

                </table>
            </div>
        </div>

    </div>

    <!-- script buat js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>