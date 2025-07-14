<?php
session_start();
if (isset($_SESSION['mySession'])) {
    $user_id = $_SESSION['mySession'];
    
} else { 
    header("Location:login.php");
    exit();
}   
?>


<?php
include "connect.php";

// Kiểm tra nếu nhận được yêu cầu xóa
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
 
    $sql = "DELETE FROM products WHERE product_id = ?";

    // Chuẩn bị và thực thi câu lệnh
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // 'i' là kiểu số nguyên

    if ($stmt->execute()) {
        echo "Record deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();

// Chuyển hướng về trang farmer.php
header("Location: farmer.php");
exit();
?>





