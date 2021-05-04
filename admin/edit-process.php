<?php
if(!isset($_POST) || $_POST == ''){
        header('Location: index.php');
        exit;
    } else {
        require_once "../connect.php";
        $aisle_number = 10;
    	$img_name = $_FILES['Item_Pic']['name'] ? time().$_FILES['Item_Pic']['name'] : $_POST['cur-img'];
        if($_FILES['Item_Pic']['name']) {
            echo 'Hereeee';
        	$uploads_dir = '../images';
        	move_uploaded_file($_FILES['Item_Pic']['tmp_name'], "$uploads_dir/$img_name");
        }

        $sql_update = "UPDATE Item SET Item_Name = :item_name, Item_Pic = :item_pic, Unit_Price = :unit_price, Item_Brand = :item_brand, Quantity = :quantity, Aisle_Number = :aisle_number, Type = :type WHERE Item_Id = :item_id";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->bindParam(':item_name', $_POST['Item_Name']);
        $stmt_update->bindParam(':item_pic', $img_name);
        $stmt_update->bindParam(':unit_price', $_POST['Unit_Price']);
        $stmt_update->bindParam(':item_brand', $_POST['Item_Brand']);
        $stmt_update->bindParam(':quantity', $_POST['Quantity']);
        $stmt_update->bindParam(':aisle_number', $aisle_number);
        $stmt_update->bindParam(':type', $_POST['Type']);
        $stmt_update->bindParam(':item_id', $_POST['Item_Id']);

        if($stmt_update->execute()) {
        	echo "Item Updated Successfully";
        } else {
        	echo "Error while updating item";
        }
    }
?>
