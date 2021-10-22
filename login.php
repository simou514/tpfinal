<?php

   $connect = mysqli_connect ("localhost", "root","","test");
   session_start();
   if (isset($_POST["monForm"]))

{
   if(!empty($_POST["username"])  || !empty($_POST["password"])) {
    $pw =$_POST["password"];
    $username=mysqli_real_escape_string($connect,$_POST["username"]); 
    $password=mysqli_real_escape_string($connect,$_POST["password"]); 
    $password=password_hash($password,PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$pw')";
    $sql="SELECT * FROM users  WHERE Username='$username' and password='$pw'   ";
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
                    $valideCode = false;
                          if(isset($_POST["password"]))
                        {
                            $code = $_POST["password"];
                            $regExpCode = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; 
                            $resultat = preg_match($regExpCode, $code);
                            $username=mysqli_real_escape_string($connect,$_POST["username"]); 
                            $password=mysqli_real_escape_string($connect,$_POST["password"]);                
                            $password=password_hash($password,PASSWORD_DEFAULT);
                            $pw =$_POST["password"];

                           
                         
                           if(strlen($_POST["password"])<6)
                            {
                               $messageCode = " <span style='color:red;'> Un mot de passe doit contenir au minimum 6 caractères </span>";
                              
                            }
                            else if(  ($pw == 123456789) OR ($pw=="motdepasse"))
                            {
                               $messageCode = " <span style='color:red;'>Ce mot de passe est dans une liste de mots de passe bannis. </span>";
                            }
                           else if($resultat === 0)
                            {
                               $messageCode = " <span style='color:red;'>Le mot de passe doit contenir au moins huit caractères, au moins une lettre majuscule, une lettre minuscule et un chiffre EX: Abcdef123</span>";
                            }                          
                                                        
                            else
                            {
                                $valideCode = true;
                            }
                           
                           
                        }
                    ?>   
                     <?php
      
                if(isset($_POST["monForm"]) )
                {
                    if($valideCode ) 
                      if(!$count ) {                       
                      {
                        if(isset($_POST["username"]))
                            echo "<h1>Bienvenue :<strong> " .$username. " </strong></h1> <br>";
                        if(isset($_POST["password"]))
                        echo " <h2> Vous pouvez faire un achat maintenant </h2>   <br><br>";
                    }
        }
    }
    ?>                
           
                        <form method="POST">
                        <br><br>
                             Entrez un nom d’utilisateur :
                             <input type="text" name="username" value="<?= $name ?>" /><?= $messageName ?><br><br>
                             Entrez un mot de passe :
                              <input type="text" name="password" value="<?= $code ?>" /><?= $messageCode ?><br><br>
                             <input type="submit" value="Envoyer"name="monForm"/>
                        </form>                      

    </body>
</html>