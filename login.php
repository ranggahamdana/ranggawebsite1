<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN ADMIN</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <style>
        img {
            position : fixed;
            z-index : -100;
        }
        h1 {
            color : red;
            align : center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <img src="gambar.jpg" alt="">
        <div class="row">
             <div class="col-3"></div>
             <div class="col-6">
             <div class="kotak-login"></div>
             <center><h2>Login Account</h2></center>
            <form action=""method="post">
                    <div class="form-group">
                          
                        <label for="username">username</label></label>
                        <input class="form-control" type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="login" type="submit">LOGIN</button>
                    </div>
            </form> 
            </div>
            <div class="col-3"></div>
        </div>
    </div>
<?php
include('koneksi.php');
if (isset($_POST['login'])) {
    echo $username = $_POST['username'];
    echo $password = $_POST['password'];
    
    $query = mysqli_query($konek,"SELECT * FROM user WHERE username = '$username' && password = '$password'");

   if (mysqli_num_rows($query)>0) {
        ?>
        <?php
       header('location:admin.php');
   }else{
       ?>
       <script>
           alert('Username atau Password anda salah !!!!')
       </script>
       <?php
   }
}
    ?>
</body>
</html>