<?php
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !='yes') {
header('Location:login.php');
exit;
}
require_once('../connect.php');
// Fetch Vegetable
$stmtItms = $pdo->prepare("SELECT * FROM Item");
$stmtItms->execute();
$resultItms = $stmtItms->fetchAll(PDO::FETCH_ASSOC);
// Fetch Vegetable Ends
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
    <!--Vegetable begins here-->
    <div class="deals-container" id="vegetables">
        <div class="parallax">
            <div class="title">Items</div>
        </div>
        <?php
        foreach ($resultItms as $keyItm => $valueItm)
        {
            $curImg = $valueItm['Item_Pic'] ? '../images/'.$valueItm['Item_Pic'] : ''
        ?>
        <div class="items">
            <div class="images">
                <!--change link to SELECT statement coming from DB-->
                <img src="<?php echo $curImg ?>" class="item-image-size" />
            </div>
            <div class="description">
                <b class="itm-name"><?php echo $valueItm['Item_Name'] ?></b><br />
                <div class="item-select">
                    Price: $<span class="itm-price"><?php echo $valueItm['Unit_Price'] ?></span>/lbs
                </div>
                <div class="item-select">
                    Type: <?php echo $valueItm['Type'] ?></span>
                </div>
                <a href="edit.php?itemId=<?php echo $valueItm['Item_Id'] ?>" class="button button2">Edit</a>
                <a href="delete.php?itemId=<?php echo $valueItm['Item_Id'] ?>" class="button button3">Delete</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!--Vegetable ends here-->
</BODY>

</HTML>