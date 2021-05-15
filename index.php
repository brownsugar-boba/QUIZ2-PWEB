<?php 
//using a session for login
session_start();

//database
include 'dbconnect.php';

//variabel
$error      = "";
$username   = "";
$ingataku   = "";

//check available cookies
if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "select * from login where username = '$cookie_username'";
    $q1   = mysqli_query($koneksi,$sql1);
    $r1   = mysqli_fetch_array($q1);

//register session 
    if($r1['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

//redirect menu.php
if(isset($_SESSION['session_username'])){
    header("location:menu.php");
    exit();
}

//cek tombol login
if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
//empty message
    if($username == '' or $password == ''){
        $error .= "<li>Silakan masukkan username dan juga password.</li>";

//database check
    }else{
        $sql1 = "select * from login where username = '$username'";
        $q1   = mysqli_query($koneksi,$sql1);
        $r1   = mysqli_fetch_array($q1,MYSQLI_ASSOC);

//wrong message
        if(is_null($r1)){
            $error .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $error .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       

//register a session (server)
        if(empty($error)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

//set coockie (remember on website)
            if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 14); //14 days remember account
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 14); //14 days remember account
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
            header("location:menu.php");
        }
    }
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="loginbox" style="margin-top:20%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Dinda Putri Ani / 192410101078 -- Login Session and Cookies</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <?php if($error){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $error ?></ul>
                    </div>
                <?php } ?>                
                <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="username">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> Ingat Aku
                        </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="login" class="btn btn-success" value="Login"/>
                            
                            <p><br> Don't have an account yet? <a href="create.php">Create Account</a>.</p>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>