<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./img/simple_pic.jpg">
    <link rel="stylesheet" href="./css/style.css">
    <title>My beauty Salon</title>
</head>
<body> 
    <header class="headler">
        <h1>Massage and Spa</h1>              
    </header>   
    <nav>
        <div class="User-info"> 
            <?php  
                include 'www/get_current_user.php';
                $user_name =  getCurrentUser(); 
                $offer_timeleft = null;                
                $string_link = '<a href="./www/cabinet.php">(Personal cabinet)</a> ';                
                $current_user = 'User:'.'  '.$user_name;  
                if  ($user_name !==  'Guest'){
                    $current_user =   $current_user.$string_link;
                    $offer_timeleft ='Special offer Time left <<< '.getTimeLeft(getdate()).' >>>';
                } else{
                    $offer_timeleft = 'Join today and you get up to 20% discount for all services';
                }                
              
                print($current_user);          
            ?>
        </div> 
               
        <div class="log-in-out">
            <a href="./www/auth.php">Sign In</a>          
            <a href="./www/log_out.php">Sign Out</a>
        </div>
    </nav>       
    <main>        
        <h2>Welcome to Asian SPA!</h2>
        <section class="section-photo">           
            <div class="photo-container">                
                <img src="./img/massage-at-home.jpg" alt="./img/massage-at-home.jpg" width="400px" height="300px">
                <img src="./img/Post-Massage-Care-Getting-The-Most-Out-Of-Your-Massage.jpg" alt="./img/Post-Massage-Care-Getting-The-Most-Out-Of-Your-Massage.jpg"width="400px" height="300px">
                <img src="./img/massage_spa.webp" alt="./img/massage_spa.webp"width="400px" height="300px">
            </div>
        </section>
        <section class="section-description">
            <h3>Best choise</h3>
            <p>We specialize in traditional Thai massage and spa programs based on natural cosmetics from Thailand. The procedures are carried out by certified masters who have been trained and worked in hotels and prestigious SPA centers in Thailand for at least 207 years.</p>
            <p>But not only experience and education are important. Competitive selection for practice in massage salon is passed only by people who are passionate about their work. Indeed, in Thai philosophy, massage is not considered as work. It is rather a spiritual practice, an art based on a deep impact on the muscle-tendon nodes, restoration of the energy essence of the body and manual therapy with elements of passive yoga. Muscles work, tendons and joints stretch, layers of subcutaneous fat are intensely heated ...</p>
        </section>
        <section class="section-services">
            <h3>Relevant services</h3>
            <table>                
                <tr>
                  <th>Name</th>
                  <th>Price</th>   
                  <th>Time</th>               
                </tr>
                <tr>
                  <td>Thai back massage</td>
                  <td>100 &#36</td> 
                  <td>~30 min </td>                    
                </tr>
                <tr>
                    <td>Thai face and head massage</td>
                    <td>110 &#36</td> 
                    <td>~45 min </td>                    
                  </tr>
                  <tr>
                    <td>Traditional Thai massage in kimono</td>
                    <td>120 &#36</td> 
                    <td>~50 min </td>                    
                  </tr>
                  <tr>
                    <td>Relaxing aroma oil massage</td>
                    <td>80 &#36</td> 
                    <td>~40 min </td>                    
                  </tr>
                  <tr>
                    <td>«Spa-chocolate» — chocolate peeling, body wrap, aroma oil massage</td>
                    <td>200 &#36</td> 
                    <td>~80 min </td>                    
                  </tr>
            </table>            
        </section>    
        <section class="section-discount">
            <h3>Offers and Discounts</h3> 
            <p><?=$offer_timeleft?></p> 
            <p>Special offer: Only for this month Thai back massage price is <strong>50&#36</strong></strong></p>        
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