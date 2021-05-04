<?php
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !='yes') {
    header('Location:login.php');
    exit;
}
require_once('../connect.php');
// Fetch Items
$stmtItemDelete = $pdo->prepare("DELETE FROM Item WHERE Item_Id = :item_id");
$stmtItemDelete->execute(array(
    ':item_id'=> $_GET['itemId']
));
if($stmtItemDelete->execute()) {
    echo "Item successfully deleted.";
} else {
    echo "Error while deleting item.";
}
// Fetch Items Ends
?>
