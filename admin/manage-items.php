<?php
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !='yes') {
header('Location:login.php');
exit;
}

?>
<HTML>

<HEAD>
    <META NAME="Author" CONTENT="">
    <META NAME="Keywords" CONTENT="">
    <META NAME="Description" CONTENT="">
    <link rel="stylesheet" href="../home.css" />
    <script src="https://kit.fontawesome.com/6c45d783a1.js" crossorigin="anonymous"></script>
</HEAD>

<BODY>
    <div class="parallax">
        <div class="page-title">Market Basket WebApp</div>
        <a class="button button3" href="logout.php">Logout</a>

    </div>
    <a class="button button2" href="add-new.php">Add Item</a>
    <a class="button button4" href="edit-delete.php">Edit/Delete Item</a>
</BODY>

</HTML>