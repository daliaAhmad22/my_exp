<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up Page</title>    
    </head>
    <body>
        <center>
        <form  action="admin/addCustomer.php" method="POST">
        <div style=" background-color: wheat;">
        <h1>Sign Up</h1>
        <p>Please Fill This Form To Create An Account.</p>
        <label ><b>Name  :</b></label>
        <input type="text" placeholder="Enter name" name="name" required>
        <br> <br>

        <label ><b>Username  :</b></label>
        <input type="text" placeholder="Enter username" name="uname" required>
        <br> <br>

        <label ><b>Password :</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <br> <br>
        <label ><b>Confirm Password :</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        <br> <br>
        <label><input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
        <p>By creating an account you agree to our <a href="term_privacy.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <input type="submit" name="submit1" value="signUp">
            <br>
            <br>
            <a href="login.php" class="ca">Already have an account?</a>

        </div>
        </div>
        </form>
        <br> <br>
        <p><b>Oh, you are  not a member of this site!! Hurry up to get the best sales</b></p>
        </center>
    </body>
</html>






