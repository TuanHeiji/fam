<?php
session_start();
if (isset($_SESSION['mySession']) && isset($_SESSION['mySession_name'])) {
    $user_id = $_SESSION['mySession'];
} 
elseif (isset($_SESSION['mySessionAdmin']) && isset($_SESSION['mySession_nameAdmin'])) {
    $user_id = $_SESSION['mySessionAdmin'];
    $username = $_SESSION['mySession_nameAdmin'];
}
else { 
    header("Location:login.php");
    exit();
}   
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đang phát triển</title>
</head>
<body>
    <h1>Tính năng đang phát triển, vui lòng <a href="farmer.php?id=<?php echo $user_id; ?>" style="color: green">quay lại</a></h1>
</body>
</html>