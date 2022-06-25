<?php
include '../koneksi.php'; //akses koneksi

$id         = "";
$foto       = "";
$judul      = "";
$ukuran     = "";
$harga      = "";
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
    // $sqlverifikasi  = "insert into stand ('STATUS') values ('Verified') where id_stand = '$id'";
    $sqlverifikasi  = "update stand set STATUS = 'Verified' where id_stand = '$id'";
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
    header("refresh:5;url=verifikasi_stand.php"); // refresh halaman data user
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
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Stand.in</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="kelola_user.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Kelola User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="verifikasi_stand.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Verifikasi Stand</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <!-- <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">File Manager</span>
       </a>
       <span class="tooltip">Files</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li> -->
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!--<img src="profile.jpg" alt="profileImg">-->
                    <div class="name_job">
                        <div class="name">(Nama Admin)</div>
                        <div class="job">Administrator</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Verifikasi Stand</div>
        <div class="mx-auto">
            <div class="card">
                <div class="card-header" style="font-weight:bold;">
                    Tolak / Setujui Data Stand
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
                                $id = $read['ID_STAND'];
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
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>