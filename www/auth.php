<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/simple_pic.jpg">
    <link rel="stylesheet" href="../css/auth.css">
    <title>Sign in</title>
</head>
<body>
    <main>
        <div class="login-page">
            <div class="form"> 
            <?php
             include 'get_current_user.php';              
             $login_stamp = getCurrentLogTime() ?? null;
             $login_stamp !==null? $user_exist = 'You are already log in. Pls log out first!' : $user_exist = '';
             $_COOKIE['password']=='false'?  $user_exist = 'Incorrect username or password!' : $user_exist = $user_exist;
             setcookie('user_exist','false');
            ?> 
              <p class="warning-login" style="color: red;"><?=$user_exist?></p><br>         
              <form class="login-form" action="log_In.php" method="post">
                <input name="login" type="text" placeholder="username" required="required"/>
                <input name="password" type="password" placeholder="password" required="required"/>
                <input class="submit" id="input-submit" name="submit" type="submit" value="LOGIN">           
                <p class="message">Not registered? <a href="./create_accaunt.php">Create an account</a></p>
              </form>
            </div>
          </div>
    </main>
    <footer>
        <div class="links">
            <a href="../index.php">Vacancies</a>
            <a href="../index.php#">Contacts</a>
            <a href="../index.php">About us</a>
            <a href="../index.php">Сommercial</a>
        </div>
        <div class="copyright">Copyright &copy; Skillfactory 2023</div>
    </footer>
</body>
</html>