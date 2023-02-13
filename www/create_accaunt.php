<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/simple_pic.jpg">
    <link rel="stylesheet" href="../css/auth.css">
    <title>Create accaunt</title>
</head>
<body>
    <main>
        <div class="login-page">
        <?php
             $_COOKIE['user_exist']=='true'?  $user_exist = 'User already exist!' : $user_exist = '';
             setcookie('password','true');   
            ?>                
            <div class="form">  
            <p class="warning-login" style="color: red;"><?=$user_exist?></p><br>               
              <form class="login-form" action="log_In.php" method="post">
                <input name="login" type="text" placeholder="username" required="required"/>
                <input name="password" type="password" placeholder="password" required="required"/>
                <input class="submit" id="input-submit" name="submit" type="submit" value="CREATE">           
                <p class="message">Already registered? <a href="./auth.php">Sign In</a></p>
              </form>
            </div>
          </div>
    </main>
    <footer>
        <div class="links">
            <a href="#">Vacancies</a>
            <a href="#">Contacts</a>
            <a href="#">About us</a>
            <a href="../index.php">Сommercial</a>
        </div>
        <div class="copyright">Copyright &copy; Skillfactory 2023</div>
    </footer>
</body>
</html>