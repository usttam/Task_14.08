<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/../img/simple_pic.jpg">
    <link rel="stylesheet" href="/../css/style.css">
    <title>My beauty Salon</title>
</head>
<body> 
    <header class="headler">
        <h1>Massage and Spa</h1>              
    </header>   
    <nav>
        <div class="User-info"> 
            <?php  
                include 'get_current_user.php';            
                $current_date = date("Y-m-d");
                $current_date_value = intval(date("Ymd"));
                $current_user = getCurrentUser(); 

                if ($current_user!=='Guest'){
                   
                    $offer_timeleft ='  '.getTimeLeft(getdate());
                    $user_name = $_SESSION['username']??null;
                    $user_birth_day = $_SESSION['birthday']??null;     
                    $log_in_date =getCurrentLogTime();
                    $string_info = 'User:'.' ***'.$current_user.'***';                      
                }
                else {
                    $string_info = 'User:'.' '. $current_user;
                    header("Location: /../index.php");
                    exit;
                }   
                if (  $current_date=== $user_birth_day) {
                    $birth_tdy =  'Happy Birthday'.' '.$user_name.'!!! We made special offer for you -> 5% discount'; 
                    $birth_main_str = 'Happy Birthday'.' '.$user_name.'!!!'; 
                    $offer1 =  '->105';
                    $offer2 =  '->110';
                    $offer3 =  '->180';

                }
                else {
                    $birth_time_left = 
                    $birth_tdy = 'Relevant services';
                    $birth_main_str = null;
                    $offer1 =  null;
                    $offer2 =  null;
                    $offer3 =  null;
                }
                if ($user_birth_day!==null){
                    $birthday_str= mb_substr($user_birth_day,0,4).mb_substr($user_birth_day,5,2).mb_substr($user_birth_day,8,2);
                    $birth_date_value = intval($birthday_str);
                    $birth_timeleft = abs($current_date_value- $birth_date_value);                     
                }
                
           
              
                print( $string_info.'Date: '.$current_date.' '.$birth_main_str);
              
                
            ?>
        </div>       
        <div class="log-in-out">                 
            <a href="log_out.php">Sign Out</a>
        </div>
    </nav>       
    <main>        
        <h2>Person info!</h2>       
        <section class="section-main"  style="text-transform: uppercase;">
            <h3>Main information</h3>
            <p>Login name: <span style="color: blue; font-weight: bold;" ><?=$current_user?></span></p>            
            <p>Time stamp: <span style="color: black; font-weight: bold;" ><?=$log_in_date?></span></p>
            <p>Special offer time left (H:M:S): <span style="color: deeppink; font-weight: bold;" ><?=$offer_timeleft?></span></p>
            <p>Name: <span style="color: brown; font-weight: bold;" ><?=$user_name?></span></p>
            <p>Date of birth: <span style="color: brown; font-weight: bold;" ><?=$user_birth_day?></span></p>
            <p>BirthDay Time left:<span style="color: brown; font-weight: bold;" ><?=$birth_timeleft.' '.'days'?></p>          
        </section>
        <section class="section-save-data"  style="text-transform: uppercase;">
        <h3>Change data</h3>
        <form class="save-form" action="personal_data_save.php" method="post">
                <label for="Name">Name:</label>                     
                <input name="username" type="text" id="Name" placeholder="Name" required="required"/> 
                <label for="birthday">Day of Birth:</label>     
                <input name="birthday" type="date" id="birthday" placeholder="Birth date" required="required"/>
                <input class="submit" id="input-submit" name="submit" type="submit" value="SAVE DATA">   
                
              </form>
        </section>    
        <section class="section-services">
            <h3><?=$birth_tdy?></h3>
            <table>                
                <tr>
                  <th>Name</th>
                  <th>Price</th>   
                  <th>Time</th>               
                </tr>
                <tr>
                  <td style="color: blue;">Thai back massage</td>
                  <td style="color: blue;">50 &#36</td> 
                  <td>~30 min </td>                    
                </tr>
                <tr>
                    <td>Thai face and head massage</td>
                    <td>110 <?=$offer1?>&#36</td> 
                    <td>~45 min </td>                    
                  </tr>
                  <tr>
                    <td>Traditional Thai massage in kimono</td>
                    <td>120<?=$offer2?> &#36</td> 
                    <td>~50 min </td>                    
                  </tr>
                  <tr>
                    <td style="color: blue;">Relaxing aroma oil massage</td>
                    <td style="color: blue;">50 &#36</td> 
                    <td>~40 min </td>                    
                  </tr>
                  <tr>
                    <td>«Spa-chocolate» — chocolate peeling, body wrap, aroma oil massage</td>
                    <td>200 <?=$offer3?> &#36</td> 
                    <td>~80 min </td>                    
                  </tr>
            </table>            
        </section>    
        <section class="section-discount">
            <h3>Offers and Discounts</h3>          
            <p>Special offer: Only for this month Thai back massage price is <strong>50&#36</strong></strong></p> 
            <p style="text-transform: uppercase;"><?=$birth_tdy?></p>   
        <section class="section-photo">           
            <div class="photo-container">                
                <img src="/../img/massage_back_1.jpg" alt="/../img/massage_back_1.jpg" width="400px" height="300px">
                <img src="/../img/massage_leg_1.jpg" alt="/../img/massage_leg_1.jpg"width="400px" height="300px">
                <img src="/../img/massage_back_men.jpg" alt="/../img/massage_back_men.jpg"width="400px" height="300px">
            </div>
        </section>     
    </main>
    <footer>
        <div class="links">
            <a href="#">Vacancies</a>
            <a href="#">Contacts</a>
            <a href="#">About us</a>
            <a href="#">Сommercial</a>
        </div>
        <div class="copyright">Copyright &copy; Skillfactory 2023</div>
    </footer>
</body>

</html>