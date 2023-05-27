

<title>Anka Supermarché</title>
<link rel="stylesheet" href="src/styles/main.css">



<div class="container">
    <div class="content">
        <?php
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
                            $date = $_POST['date'];
                            $card_number = $_POST['card_number'];
                            $password = $_POST['password'];

                            

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
