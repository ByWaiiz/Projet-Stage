<?php 
    session_start();
    if(isset($_SESSION['id']) AND isset($_SESSION['role']))
    {

        if($_SESSION['role'] == 'admin')
        {

        
?>

<title>Anka Supermarché</title>
<link rel="stylesheet" href="src/styles/main.css">

<div class="container">


</div>


<?php 
        }else{
            header('location:profile.php?id='.$_SESSION['id']);
        }
    }else{
        header('location:../../index.php');
    }
?>