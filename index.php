

<title>Anka Supermarché</title>
<link rel="stylesheet" href="src/styles/main.css">



<div class="container">
    <div class="content">
        <?php

            require('./src/tools/db.php');

            if(isset($_GET['register']))
            {
                if($_GET['register'] == true)
                {  
                    
                    if(isset($_POST['register'])){
                        if(!empty($_POST['username']) AND !empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']) AND !empty($_POST['date']) AND !empty($_POST['card_number']) AND !empty($_POST['password'])){
                            
                            $username = $_POST['username'];
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $email = $_POST['email'];
                            $date = date("d-m-Y", strtotime($_POST['date']));
                            $card_number = $_POST['card_number'];
                            $password = sha1($_POST['password']);

                            $requser = $pdo->prepare("SELECT * FROM users WHERE username=? AND email=?");
                            $requser->execute(array($username, $email));
                            $userexist = $requser->rowCount();

                            $reqcard = $pdo->prepare("SELECT * FROM cards WHERE card_number=?");
                            $reqcard->execute(array($card_number));
                            $cardexist = $reqcard->rowCount();


                            $card_number_lenght = strlen($card_number);
                            $username_lenght = strlen($username);
                            $password_lenght = strlen($password);



                            if($userexist == 0){
                                if($card_number_lenght == 13){
                                    if($cardexist == 1){
                                        if (preg_match('#^[a-zA-Z0-9]*$#', $username)) {
                                            if($username_lenght > 3 AND $username_lenght < 30)
                                            {
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                                {
                                                    $insert = $pdo->prepare("INSERT INTO users (username,firstname, lastname, email,card_number,dn,password) 
                                                    VALUES ('$username', '$firstname', '$lastname', '$email', '$card_number', '$date', '$password')");
                                                    if ($insert->execute()) {

                                                        $reqCardOwner = $pdo->prepare("SELECT * FROM users WHERE username=? AND email=?");
                                                        $reqCardOwner->execute(array($username, $email));
                                                        $owner = $reqCardOwner->fetch();
                                                    
                                                        $updateCard = $pdo->prepare("UPDATE cards SET card_owner=:card_owner WHERE card_number=:card_number");
                                                        $updateCard->execute([
                                                            ':card_owner' => $owner['id'],
                                                            ':card_number' => $card_number
                                                        ]);

                                                        session_start();
                                                        $_SESSION['id'] = $owner['id'];
                                                        $_SESSION['role'] = $owner['role'];
                                                        header('location:./src/pages/profile.php');

                                                    }
                                                }else{
                                                    // Email
                                                }
                                            }else{
                                                // Username Lenght
                                            }
                                        }else{
                                             // Username content
                                        }
                                    }else{
                                        // Cardexist
                                    }
                                }else{
                                    // CardLenght
                                }
                             }else{
                                 // Userexist
                             }
                        }else{
                            echo 'error';
                        }
                    }
                    
            
        ?>
        <div class="box">
            <h3>Inscription</h3>
            <form method="POST">
                <label for="username">Nom d'utilisateur : </label>
                <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                <label for="lastname">Nom : </label>
                <input type="text" name="lastname" id="lastname" placeholder="Nom">
                <label for="email">E-Mail : </label>
                <input type="email" name="email" id="email" placeholder="E-Mail">
                <label for="date">Date de naissance : </label>
                <input type="date" name="date" id="date" placeholder="Date de naissance">
                <label for="card_numbe">Numéro de la carte : </label>
                <input type="text" name="card_number" id="card_number" placeholder="Numéro de la carte">
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <input type="submit" name="register" id="register" value="Inscription">
            </form>
            <a href="index.php">Se connecter</a>
        </div>
        <?php
                }
            }else{
        ?>
        <div class="box">
            <h3>Se connecter</h3>
            <form method="POST">
                <label for="username">Nom d'utilisateur : </label>
                <input type="text" name="username_login" id="username_login" placeholder="Nom d'utilisateur">
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <input type="submit" name="login" id="login" value="Se connecter">
            </form>
            <a href="index.php?register=true">Inscription</a>
        </div>
        <?php 
            }
        ?>
    </div>
</div>
