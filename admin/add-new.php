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
    <div class="container">
        <form action="add-new-process.php" method="post" enctype="multipart/form-data">
            <label>Select Type</label>
            <select class="item-select" name="Type" required>
                <option value="Vegetables" selected>Vegetables</option>
                <option value="Fruits">Fruits</option>
                <option value="Dairy">Dairy</option>
                <option value="Other">Other</option>
            </select>
            <br>
            <br>
            <label>Enter Item Name</label>
            <input type="text" placeholder="Item Name" name="Item_Name" required/>
            <br>
            <br>
            <label>Enter Unit Price</label>
            <input type="number" placeholder="Unit Price" name="Unit_Price" required/>
            <br>
            <br>
            <label>Enter Item Brand</label>
            <input type="text" placeholder="Item Brand" name="Item_Brand" required/>
            <br>
            <br>
            <label>Enter Quantity</label>
            <input type="number" placeholder="Quantity" name="Quantity" required/>
            <br>
            <br>
            <!-- <label>Enter Aisle Number</label>
            <input type="number" placeholder="Aisle Number" name="Aisle_Number" required/>
            <br>
            <br> -->
            <label>Select Image</label>
            <input type="file" id="img" name="Item_Pic" accept="image/*" required>
            <br>
            <br>
            <button class="button button2" type="submit">Add Item</button>
        </form>
    </div>
</BODY>

</HTML>