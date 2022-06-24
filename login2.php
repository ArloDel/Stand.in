<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'koneksi.php';
            $q ='select * from user';
            $result = mysqli_query($con,$q);
        ?>
        <script type="text/javascript">
            function cek(){
                alert("Angka Yang Paling Besar Adalah = " + Math.max(angka1.value, angka2.value, angka3.value));
                var max = Math.max(angka1.value, angka2.value, angka3.value)
                document.getElementById("hasil").value = max
            }
        </script>
        <title>Login || Stand.in</title>
        <body>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
                }
                body{
                    display: flex;
                    height: 100vh;
                    justify-content: center;
                    align-items: center;
                    padding: 10px;
                    background: linear-gradient(135deg, #ff4c4c, #3c2ff8) ;
                }
                .title{
                    font-weight: 500;
                    font-size: 25px;
                    margin-bottom: 30px;
                }
                .container{
                    max-width: 800px;
                    width: 100%;
                    background: #fff;
                    padding: 25px 30px;
                    border-radius: 5px;
                }
                .title{
                    font-size: 35px;
                    font-weight: 500;
                    position: relative;
                }
                .title::before{
                    content: "";
                    position: absolute;
                    left: 0;
                    bottom: 0;
                    height: 3px;
                    width: 24px;
                    background: linear-gradient(135deg, #ff4c4c, #3c2ff8) ;
                }
                .input{
                    height: 45px;
                    width: 300px;
                    margin: 5px 0 25px 200px;
                    padding-left: 20px;
                }
                .text-style{
                    margin-left: 200px;
                    font-weight: bold;
                    font-size: 19px;
                    
                }
                .button{
                    margin-top: 30px;
                    margin-bottom: 30px;
                    height: 70px;
                    width: 300px;
                    border-radius: 10px;
                    font-weight: bold;
                    background: linear-gradient(135deg, #07a302, #60ff6d) ;
                }
                .lihat{
                    margin-top: 30px;
                    margin-bottom: 30px;
                    height: 70px;
                    width: 300px;
                    border-radius: 10px;
                    font-weight: bold;
                    background: linear-gradient(135deg, #ff0404, #ff5640) ;
                } 
                .table-input{
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                }
                .row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
            </style>
            <div class="container">
                <form action="test.php" method="POST">
                    <p class="title">
                        <b>Login</b>
                    </p>
                    <p>
                        <div class="text-style">
                            Username / Email
                        </div>
                        <input type="text" class="input" id="username" required autofocus>
                    </p>
                    <p>
                        <div class="text-style">
                            Password
                        </div>
                        <input type="text" class="input" id="pass" required>
                    </p>
                    <p>
                        <div class="text-style">
                            Belum punya akun ? <a href="/register.php">Daftar Dulu</a>
                        </div>
                    </p>
                    <table class="table-input">
                        <tr>
                            <td class="row">
                                <input type="button" class="button" name="cari" value="Login" onclick="cek()"> 
                            </td>
                            <td class="row">
                                <input type="button" class="lihat" name="lihat" value="Tampilkan Password">
                            </td>
                        </tr>
                    </table>
            </form>
            </div>
        </body>
    </head>
</html>