<?php


?>

<!--- if login success-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/popup.js"></script>
</head>
<body>
    
<div class="container my-4">    
    <div id="loginbox" style="margin-top:15%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div style="color:#000000" class="panel-title"><li>Login Berhasil</li></div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >              
                <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                <?php
                    session_start();
                    echo '<h4> Selamat Datang : '.$_SESSION['session_username'].'</h4>';
                ?>
                <img src="image/ddd.jpg" height="250px" width="300px">
                    <div style="margin-top:10px" class="form-group">
                        <br>
                        <div class="col-sm-12 controls">
                        <a href="logout.php"><button type="button" class="btn btn-success" name="logout" id="button" value="Logout" onclick="togglePopup()">Logout</button>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>