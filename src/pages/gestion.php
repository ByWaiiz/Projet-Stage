<?php 
    session_start();
    require('../tools/db.php');
    if(isset($_SESSION['id']) AND isset($_SESSION['role']))
    {

        if($_SESSION['role'] == 'admin')
        {

        
?>

<title>Anka Supermarché</title>
<link rel="stylesheet" href="../styles/main.css">
<script src="../scripts/main.js"></script>

<div class="container">
    <div class="gestion-content">
        <div class="gestion-barre">
            <a href="profile.php?id=<?php echo $_SESSION['id']; ?>">Profile</a>
            <input type="button" value="Enregistrer une carte" class="newcard" id="add_new_card" name="add_new_card">
            <?php include('../tools/modal_add_card.php') ?>
        </div>
        <div class="table">
            <?php
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Numéro de la carte</th>";
                echo "<th>Propriétaire</th>";
                echo "<th>Points</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $reqcards = $pdo->query('SELECT * FROM cards');
                while ($cardsinfo = $reqcards->fetch()) {
                    echo "<tr>";
                        if($cardsinfo['card_owner'] == NULL)
                        {
                            echo "<td>" . $cardsinfo['card_number'] . "</td>";
                            echo "<td>La carte n'est pas activée</td>";
                            echo "<td>" . $cardsinfo['card_points'] . "</td>";
                        }else{

                        $requser = $pdo->prepare('SELECT * FROM users WHERE id=?');
                        $requser->execute(array($cardsinfo['card_owner']));
                        $userinfo = $requser->fetch();
                        echo "<td><a href='profile.php?id=" . $cardsinfo['card_owner'] . "'>" . $cardsinfo['card_number'] . "</a></td>";
                        echo "<td><a href='profile.php?id=" . $cardsinfo['card_owner'] . "'>". $userinfo['firstname'] . " " . $userinfo['lastname'] ."</a></td>";
                        echo "<td><a href='profile.php?id=" . $cardsinfo['card_owner'] . "'>" .  $cardsinfo['card_points'] .  "</a></td>";
                        }
                        echo "<td>";
                        echo '<button id="add_card_user" name="add_card_user"  onclick=" openModal(); returnId('.$cardsinfo['id'].')">Attribuer la carte</button>';
                        echo "<a href='profile.php?id=" . $cardsinfo['card_owner'] . "' > Supprimer la carte</a>";
                        echo "<a href='profile.php?id=" . $cardsinfo['card_owner'] . "'> Supprimer le propriétaire</a>";
                        

                    
                        
                        echo "</td>";
                    
                   
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            ?>
            <?php include('../tools/modal_add_card_user.php') ?>
        </div>
            
    </div>
</div>
<?php 
        }else{
            header('location:profile.php?id='.$_SESSION['id']);
        }
    }else{
        header('location:../../index.php');
    }
?>