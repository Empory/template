<?php
include_once __DIR__ . '/../inc/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $con = $baglanti->prepare("DELETE FROM contact WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    if ($con->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
