<?php
if(!isset($_POST) || $_POST == ''){
        header('Location: index.php');
        exit;
    } else {
        require_once "../connect.php";
        $aisle_number = 10;
    	$img_name = time().$_FILES['Item_Pic']['name'];
    	$uploads_dir = '../images';
    	move_uploaded_file($_FILES['Item_Pic']['tmp_name'], "$uploads_dir/$img_name");
    	$sql_add = "INSERT INTO Item(Item_Name, Item_Pic, Unit_Price, Item_Brand, Quantity, Aisle_Number, Type)
      	VALUES(:item_name, :item_pic, :unit_price, :item_brand, :quantity, :aisle_number, :type)";
        $stmt_add = $pdo->prepare($sql_add);
        $stmt_add->bindParam(':item_name', $_POST['Item_Name']);
        $stmt_add->bindParam(':item_pic', $img_name);
        $stmt_add->bindParam(':unit_price', $_POST['Unit_Price']);
        $stmt_add->bindParam(':item_brand', $_POST['Item_Brand']);
        $stmt_add->bindParam(':quantity', $_POST['Quantity']);
        $stmt_add->bindParam(':aisle_number', $aisle_number);
        $stmt_add->bindParam(':type', $_POST['Type']);

        if($stmt_add->execute()) {
        	echo "Item Added Successfully";
        } else {
        	echo "Error while adding item";
        }
    }
?>
