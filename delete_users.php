<?php
session_start();
if (isset($_SESSION['mySessionAdmin']) && isset($_SESSION['mySession_nameAdmin'])) {
    $user_id = $_SESSION['mySessionAdmin'];
    $username = $_SESSION['mySession_nameAdmin'];
} else { 
    header("Location:login.php");
    exit();
}   
?>


<?php
include "connect.php";

// Kiểm tra nếu nhận được yêu cầu xóa
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $sql = "DELETE FROM users WHERE user_id = ?";

    // Chuẩn bị và thực thi câu lệnh
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 

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


header("Location: admin.php");
exit();
?>





