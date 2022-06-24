<html>

<head>
    <title>Registrasi StandIn</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
        * {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 700px;
            background: lightgray;
        }
        
        h2 {
            text-align: center;
        }
        
        #regist {
            margin-left: 50px;
        }
        
        div.register {
            margin-top: 50px;
            background-color: #FAFAFA;
            width: 100%;
            font-size: 15px;
            border-radius: 10px;
            border: 1px;
        }
        
        .pointer {
            cursor: pointer;
        }
        
        form#regist {
            margin: 40px;
        }
        
        input#details {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
        }
        
        input#submit {
            width: 300px;
            padding: 7px;
            border: 1px;
            font-weight: 600;
            border-radius: 7px;
            background: #eb46fa;
        }
        
        input#reset {
            width: 300px;
            padding: 7px;
            border: 1px;
            border-radius: 7px;
            background: #000;
            color: #fff;
        }
        
        select#pendidikan {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
        }
        
        input#telp {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
        }
        
        .label {
            font-weight: bold;
        }
        
        input#kelamin {
            width: 60px;
        }
        
        input#minat {
            width: 30px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="register">
            <br>
            <h2>REGISTRASI</h2>
            <form id="regist">
                <label>Nama</label>
                <br>
                <input type="text" placeholder="Masukkan nama lengkap anda" id="details" required>
                <br><br>
                <label>Email</label>
                <br>
                <input type=email placeholder="Masukkan email aktif anda" id="details" required>
                <br><br>
                <label>Username</label>
                <br>
                <input type="text" placeholder="Masukkan username anda" id="details" required>
                <br><br>
                <label>Password</label>
                <br>
                <input type="password" placeholder="Masukkan password anda" id="details" required>
                <br><br>
                <label>No Telp</label>
                <br>

                <input type="text" placeholder="Nomor telepon aktif anda" id="telp" required>
                <br><br>
                <label>Alamat</label>
                <br>
                <input type="text" placeholder="Alamat anda" id="telp" required>
                <br><br>


                <input type="checkbox" name="setuju" required>
                <span style="font-size:14px">Saya telah mengisi data dengan benar</span>
                <br><br>
                <input type="submit" id="submit" class="pointer">
                <br><br>
                <input type="reset" id="reset" value="Kosongkan Form" class="pointer">
                <br>
                <br><br>
            </form>
        </div>
    </div>
</body>
<!html>