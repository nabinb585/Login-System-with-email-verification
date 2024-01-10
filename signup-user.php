<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
   
    <!-- Implementing Inline CSS  -->
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100&family=Poppins:wght@500&family=Ubuntu:wght@500;700&display=swap');
        html,body{
            width: auto;
            font-family: 'Ubuntu', sans-serif;
            background: url(image.svg);
            height: 100%;
            background-position: right;
            background-repeat: no-repeat;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        ::selection{
 
        }
        .container{ 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container .form{
            right: 10%;
            background: #fff;
            padding: 30px 35px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .container .form form .form-control{
            height: 40px;
            font-size: 15px;
        }
        .container .form form .forget-pass{
            margin: -15px 0 15px 0;
        }
        .container .form form .forget-pass a{
           font-size: 15px;
        }
        .container .form form .button{
            background: #6665ee;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .container .form form .button:hover{
            background: #5757d1;
        }
        .container .form form .link{
            padding: 5px 0;
        }
        .container .form form .link a{
            color: #6665ee;
        }
        .container .login-form form p{
            font-size: 14px;
        }
        .container .row .alert{
            font-size: 14px;
        }
        form .form-group{
            top: 50%;
            left: 50%;
            width: 300px;
        }

        span{
            position: absolute;
            right: 50px;
            transform: translate(0,-50%);
            top: 39%;
            cursor: pointer;
        }
        div.field{
            width: 99%;
            margin-top: 5%;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            color: #495057;
            background: white;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: space-between;

            
        }
        input.form-control.password{
            width: 80%;
            padding: 1% 0% 1% 3%;
            background: none;
            border: none;
            outline: none;
        }
        div.show-pass, div.gen-pass{
            font-size: 90%;
            font-weight: 900;
            color: grey;
            cursor: pointer;
            margin-right: 3%;
            display: flex;
            align-items: center;
        }
        i.material-icons{
            font-size: 200%;
        }
        div.show-pass::selection, div.gen-pass::selection, div.show-pass > *::selection, div.gen-pass > *::selection{
            background: none;
        }

        div.progress-bar{
            padding: 1% 0%;
            margin-top: 1%;
            display: flex;
            background-color: white;
            justify-content: space-between;
        }
        .progress-bar {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: row;
            -ms-flex-pack: center;
            justify-content: center;
            overflow: hidden;    
            color: #fff;
            text-align: center;
            white-space: nowrap;
            width: 100%;
            transition: width .6s ease;
        }
        div.progress-bar > div {
            border: 1px solid lightgrey;
            width: 22%;
            height: 8px;
            border-radius: 5px;
        }

        div.percentage{
            border: 1px solid lightgrey;
            margin: 1% 30% 1% 30%;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 200%;
            position: relative;
        }
        div.percentage > div.digit{
            font-size: 100%;
        }
    </style>
    
    <!-- Google Captcha script -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- captcha script  -->
    <script>
            var recaptcha_response = '';
            function submitUserForm() {
                if(recaptcha_response.length == 0) {
                    document.getElementById('g-recaptcha-error').innerHTML = '<p style="color:red;">Please verify you are human.</p>';
                    return false;
                }
                return true;
            }
             
            function verifyCaptcha(token) {
                recaptcha_response = token;
                document.getElementById('g-recaptcha-error').innerHTML = '';
            }
</script>
    <!-- Google Captcha Script end -->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="" onsubmit="return submitUserForm();"> 
                    <h2 class="text-center">Signup Form</h2>
                   
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group" >
                        <input class="form-control" type="text" name="name" placeholder="Userame" pattern="[a-z0-9]{6,20}" title = "Should be lowercase or number with 6 characters." required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group field">
                         <input type="password" id= "password"  name="password" class=" form-control password" placeholder="Password" required >

                       
                        <div class="gen-pass">GENERATE</div>
                        <div class="show-pass"><i class="material-icons">visibility</i></div>
                        </div>
                        <div class="progress-bar">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>

                        <div class="percentage">
                            <div class="digit">0</div>%
                        </div>
               
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>

                    <!-- captcha -->
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lefi14gAAAAAO1cdFbLuMacw_GT-uc_HyIwkpXz" data-callback="verifyCaptcha"></div>
                        <div id="g-recaptcha-error"></div>
                    </div>
                    <!-- captcha end -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already have an account? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Loading Scripts -->
    <script src="./js/lslstrength.js"></script>
</body>
</html>