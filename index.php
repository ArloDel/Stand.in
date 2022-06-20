<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stand.in || Website Penyewaan Stand</title>
    <link rel="stylesheet" href="./style.css">

    <!-- Koneksi Ke Database -->
    <?php
        include 'koneksi.php';
        $q ='select * from stand';
        $result = mysqli_query($con,$q);
    ?>
</head>
<body>
    <table cellspacing="0">
        <tr class="menu">
            <td>
                <div class="logo">Stand.in</div>
            </td>
            <td>
                <div class="nav-menu">
                    <ul>
                        <li>
                            <a class="active" href="./index.php">Home</a>
                        </li>
                        <li>
                            <a class="nonactive" href="./AboutUs.html">About Us</a>
                        </li>
                        <li class="login">
                            <a class="nonactive" href="./login.html">Login</a>
                        </li>
                        <li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="text" class="search" id="cari" placeholder="Cari Stand">
                <select class="select">
                    <option>Terbaru</option>
                    <option>Termurah</option>
                    <option>Termahal</option>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="stand">
                        <?php
                        while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                        ?>
                            <tr>
                                <td> <img src="<? $row['FOTO_STAND']?>" class="gambar"> </td>
                                <td class="deskripsi">
                                    <table>
                                        <tr>
                                            <td colspan="2">
                                                <b class="judul"><?php echo $row['JUDUL'];?></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="placement">
                                                <br> Tipe Stand
                                            </td>
                                            <td>
                                            <br>: <?php echo $row['TIPE_STAND']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="placement">
                                                <br> Ukuran
                                            </td>
                                            <td>
                                                <br>: <?php echo $row['UKURAN']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="placement">
                                                <br> Alamat
                                            </td>
                                            <td>
                                                <br>: <?php echo $row['ALAMAT']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="placement">
                                                <br> Kota
                                            </td>
                                            <td>
                                                <br>: <?php echo $row['KOTA']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br class="placement"> Harga
                                            </td>
                                            <td>
                                                <br>: Rp.<?php echo $row['HARGA_STAND']; ?> / Bulan
                                            </td>
                                        </tr>
                                    </table>  
                                <td> <a href="info.php?ID_STAND=<?php echo $row['ID_STAND'];?>"><button class="button">Lihat Stand </button></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="footer">@Copyright 2022 Stand.in Indonesia</div>
            </td>
        </tr>
    </table>
</body>
</html>