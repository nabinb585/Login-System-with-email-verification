<?php require_once "controllerUserData.php"; ?>
<?php 
// session will stay alive for 30 seconds only
$duration = 30;  
if(isset($_SESSION["loggedin"])){
    $duration = $_SESSION["loggedin"]["duration"];
    $start = $_SESSION["loggedin"]["start"];

    if((time() - $start)> $duration){
        unset($_SESSION["loggedin"]["duration"]);
        unset($_SESSION["loggedin"]["start"]);
        unset($_SESSION["loggedin"]);

        header('location: login-user.php?status=error&msg=Session has been expired after 30 seconds');
    }
}
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100&family=Poppins:wght@500&family=Ubuntu:wght@500;700&display=swap');
    html,body{  
            background: url(home.svg);
            font-family: 'Ubuntu', sans-serif;
            height: 100vh;
            background-position: -10% 100%;
            background-repeat: no-repeat;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Ubuntu', sans-serif;
    }

    nav a.navbar-brand{
        color: #fff;
        font-size: 50px!important;
        font-weight: 500;
    }
    nav  a.change{
        color: #fff;
        font-size: 16px!important;
        font-weight: 500;
        margin-left: 70%;

    }
    button a{
        color: #6665ee;
        font-weight: 500;
        cursor: pointer;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 20%;
        left: 80%;
        width: 100%;
        color: blue;
        margin-top: 30px;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 30px;
        font-weight: 600;

    }
    </style>
</head>
<body>
    <nav class="navbar">

    <a class="navbar-brand" href="">
        NB 
    </a>
    <!-- <a class="change" href="change.php">
        Change Password 
    </a> -->
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>

    </nav>
    
    <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
</body>
</html>