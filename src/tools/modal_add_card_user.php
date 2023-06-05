

<link rel="stylesheet" href="../styles/modal_add_card_user.css">

<div id="give-card" class="modal-give">

  <div class="modal-give-content">
    <span class="close-give-modal">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>


<script>
    // Get the modal
var modal2 = document.getElementById("give-card");

// Get the button that opens the modal
var buttons = document.querySelectorAll("#add_card_user");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close-give-modal")[0];

// When the user clicks on the button, open the modal


function openModal()
{
    modal2.style.display = "block";
}



// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>