<?php 
    session_start();
    if(isset($_SESSION['id']) AND isset($_SESSION['role']))
    {
        $profil_id = $_SESSION['id']; 
        $profil_role = $_SESSION['role']
?>

<title>Anka Supermarché</title>
<link rel="stylesheet" href="src/styles/main.css">







<?php 
    }else{
        header('location:../../index.php');
    }
?>