<!DOCTYPE html>
<html>
<head>
    <title>Change password</title>
<style>
    .form-table
{
    width:350px;
    margin-left: auto;
    margin-right: auto;
}
 
label{
    font-weight: bold;
}
 
#form_submission_ajax{
    background-color: #eee;
    padding-top: 10px;
    padding-bottom: 10px;
}
 
.error{
    color: #ff0000;
}
 
input {
    border: 2px solid #531EBF;
    padding: 4px;
}
 
input[type="submit"] {
    padding: 5px 15px;
    background-color: #531EBF;
    border: 2px solid #531EBF;
    color: #fff;
    border-radius: 5px;
}
 
h1 {
    color: #531EBF;
}
</style>
<script type="text/javascript" src="jquery-1.11.1.js"></script>
</head>
<body>
 
<?php 
session_start();
     
$error = [
"old_password_error" => '',
"new_password_error" => '',
"confirm_password_error" => ''
];
 
$form_data = [
"old_password" => '',
"new_password" => '',
"confirm_password" => ''
];
 
if(!empty($_SESSION['error']))
{
    $error = $_SESSION['error'];
}
 
if(!empty($_SESSION['form_data']))
{
    $form_data = $_SESSION['form_data'];
}
 
?>
 
    <h1><center>Change Password Form</center></h1>
    <form action="change-password.php" method="post" onsubmit="return validate();" id="form_submission_ajax">
        <table class="form-table">
             
            <tr>
                <td><label>Old password:</label></td>
                <td><input type="password" name="old_password" id="old_password" value="<?php echo $form_data['old_password']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td id="old_password_error" class="error"><?php echo $error['old_password_error']; ?></td>
            </tr>
 
            <tr>
                <td><label>New Password:</label></td>
                <td><input type="password" name="new_password" id="new_password" value="<?php echo $form_data['new_password']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td id="new_password_error" class="error"><?php echo $error['new_password_error']; ?></td>
            </tr>
 
            <tr>
                <td><label>Confirm Password:</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password" value="<?php echo $form_data['confirm_password']; ?>"></td>
            </tr>
 
            <tr>
                <td></td>
                <td id="confirm_password_error" class="error"><?php echo $error['confirm_password_error']; ?></td>
            </tr>
 
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="user_id" id="user_id" value="1">
                    <input type="submit" name="submit" value="Submit">
                    <div class="link login-link text-center">Back to <a href="home.php">Home</a></div>
                </td>
            </tr>
        </table>
    </form>
</body>
 
<script type="text/javascript">
function validate()
{
    var valid = true;
    var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
 
    if(old_password=='' || old_password==null)
    {
        valid=false;
        $('#old_password_error').html("* This field is required.");
    }
    else
    {
        $('#old_password_error').html("");  
    }
 
    if(new_password=='' || new_password==null)
    {
        valid=false;
        $('#new_password_error').html("* This field is required.");
    }
    else
    {
        $('#new_password_error').html("");
    }
 
    if(confirm_password=='' || confirm_password==null)
    {
        valid=false;
        $('#confirm_password_error').html("* This field is required.");
    }
    else
    {
        $('#confirm_password_error').html("");
    }
 
    if(new_password != '' && confirm_password != '')
    {
        if(new_password != confirm_password)
        {
            valid = false;
            $('#confirm_password_error').html("* Confirm password is same as new password.");
        }
 
        if(new_password == confirm_password)
        {
            $('#confirm_password_error').html("");          
        }
    }
 
    if(valid==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
</html>   
 
<?php 
$_SESSION['error'] = "";
$_SESSION['form_data'] = "";
?>