<?php 
    session_start();
    require('../tools/db.php');
    if(isset($_SESSION['id']) AND isset($_SESSION['role']))
    {
        if(isset($_GET['id']))
        {

            $profil_id = $_SESSION['id']; 
            $profil_role = $_SESSION['role'];

        
            $requser = $pdo->prepare("SELECT * FROM users WHERE id=?");
            $requser->execute(array($profil_id));
            $userexist = $requser->rowCount();


            if($userexist == 1)
            {
                $info =  $requser->fetch();

                $reqcard = $pdo->prepare("SELECT * FROM cards WHERE card_owner=?");
                $reqcard->execute(array($profil_id));
                $cardexist = $reqcard->rowCount();

                $card =   $reqcard->fetch();

                if($cardexist == 1)
                {

                


?>

<title>Anka Supermarché</title>
<link rel="stylesheet" href="../styles/main.css">


<div class="profile"> 
   <div class="left">
        <div class="top">
            <h2>Profile</h2>
        </div>
        <div class="content-info">
            <label> Nom d'utilisateur : <?php echo  $info['username'] ?> <br> <br></label>
            <label> Nom : <?php echo  $info['lastname'] ?> <br> <br></label>
            <label> Prénom : <?php echo  $info['firstname'] ?> <br> <br></label>
            <label> Date de naissance : <?php echo  $info['dn'] ?> <br> <br></label>
            <label> E-Mail : <?php echo  $info['email'] ?> <br> <br></label>
            <label> Numéro de la carte  : <?php echo  $info['card_number'] ?> <br> <br></label>
        </div>
        <div class="bottom">
            <a href="">Historique d'achat</a>
            <a href="../tools/deconnexion.php">Deconnexion</a>
            <?php 
                if($_SESSION['role'] == 'admin')
                {
            ?>
                <a href="gestion.php">Gestion</a>
            <?php 
                }
            ?>

        </div>
   </div>
   <div class="right">
        <div class="card">
            <img src="../data/images/logo_card.png" alt="">
            <label> <?php echo  $card['card_points'] ?> </label>
        </div>
   </div>
</div>




<?php 
     }else{
         
     }
     }else{
         
     }
    }else{
        
    }
    }else{
        header('location:../../index.php');
    }
?>