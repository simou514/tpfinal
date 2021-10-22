<?php

   $connect = mysqli_connect ("localhost", "root","","test");
   session_start();
   if (isset($_POST["monForm"]))

{
   if(!empty($_POST["username"]) ) {
   
    $username=mysqli_real_escape_string($connect,$_POST["username"]); 
     
    $query = "INSERT INTO contact (message) VALUES ('$message')";
    $sql="SELECT * FROM contact  WHERE message='$message'   ";
    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($result);

    if(mysqli_query($connect,$query  )  ) {
        if($count > 0 ) {
            echo "<h3><br><br>utilisateur $username  existe deja dans la base de données</h3><br>";
    }    
   } 
  }
 }    
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoo forestier de Val-Jalbert</title>
	<meta name="description" content="582-21W-MA Création et design  de site Web  TP 2">

    <!-- styles -->
    <link rel="stylesheet" href="./styles/style.css"> 
</head>
<body style="background-color:#bc8f8f;">
      
    <header class="top-header clearfix"> 

        <nav class="top-nav">
            
            <div class="maxwidth">
        
              <ul class="menu">
                  <li><a href="index.html">Accueil </a>
                  <li><a href="login.php">Achats</a>
                  <li class="active"><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </nav> 

        </header>
        <!-- fin menu -->  
       <?php      
                    $code = "";
                    $messageCode = "";
                    $messageName = "";
                    $name = "";
                    $valideCode = true;
                       
                    ?>   
                     <?php
      
                if(isset($_POST["monForm"]) )
                {
                    if($valideCode ) 
                                          
                      {
                        if(isset($_POST["message"]))
                            echo "<h1> Merci votre message a bien été envoyé </strong> </h1>";
                       
                    }
       
    }
    ?>                
           
                        <form method="POST">
                        <br><br>
                             laisser un messages :
                             <input type="text"
                            cols="90" 
                            rows="5" 
                            style="width:300px; height:150px;"name="username" value="<?= $name ?>" /><?= $messageName ?><br><br>
                            
                             <input type="submit" value="Envoyer"name="monForm"/>
                        </form>                      

    </body>
</html>
