<?php 
    require('db.php');
    if(isset($_SESSION['id']) AND isset($_SESSION['role']))
    {

        if($_SESSION['role'] == 'admin')
        {
?>

<link rel="stylesheet" href="../styles/modal_add_card.css">



<!-- The Modal -->
<div id="addcard" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="top-modal">
        <span class="close">&times;</span>
    </div>


    <?php 
        if(isset($_POST['create_card']))
        {
            if(!empty($_POST['new_card_number']))
            {
                $new_card = $_POST['new_card_number'];
                $new_card_lenght = strlen($new_card);

                if($new_card_lenght == 13)
                {
                    $reqcard = $pdo->prepare("SELECT * FROM cards WHERE card_number=?");
                    $reqcard->execute(array($new_card));
                    $cardexist = $reqcard->rowCount();

                    if($cardexist == 0)
                    {
                        $insert = $pdo->prepare("INSERT INTO cards (card_number) VALUES ('$new_card')");
                        if ($insert->execute()) {
                            $new_card = "";
                        }
                    }else{
                        ///error message
                    }
                }else{
                    ///error message
                }

            }
        }

    ?>


    <form method="post">
        <label for="">Numéro de la carte : </label>
        <input type="text" id="new_card_number" name="new_card_number" placeholder="Numéro de la carte">
        <input type="submit" id="create_card" name="create_card">
        
    </form>
  </div>

</div>


<script>
    // Get the modal
var modal = document.getElementById("addcard");

// Get the button that opens the modal
var btn = document.getElementById("add_new_card");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php 


        }else{
            header('location:../pages/profile.php?id='.$_SESSION['id']);
        }
    }else{
        header('location:../../index.php');
    }
?>