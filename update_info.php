<?php 
session_start();
if (isset($_SESSION['mySession'])) {
    $user_id = $_SESSION['mySession'];
} 
elseif(isset($_SESSION['mySessionAdmin'])){
    $user_id = $_SESSION['mySessionAdmin'];
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
    <title>Sửa thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
</head>

<body>
<section class="py-4">
<div class="container py-4" style="width: 100%; max-width: 600px;  background-color: #E7F5DC; border-radius: 20px;">
<?php
    require "connect.php";
    mysqli_set_charset($conn, 'UTF8'); // sửa lỗi tiếng Việt


        // Lấy dữ liệu sản phẩm theo ID
        $sql = "SELECT * FROM info_users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $pass = $result->fetch_assoc();
        } else {
            header("location: info.php");
        }
        $stmt->close();
    
?>

    <form method="post" action="">
        <div class="form-group">
            <label for="product_name">Họ và tên:</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($pass['name']); ?>">
        </div>
        <div class="form-group">
            <label for="price">Giới tính:</label>
            <select class="form-control" name="gender" id="gender">
                <option value="Nam" <?php echo ($pass['gender'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($pass['gender'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                <option value="Bí mật" <?php echo ($pass['gender'] === 'Bí mật') ? 'selected' : ''; ?>>Bí mật</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Số điện thoại:</label>
            <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($pass['phone']); ?>">
        </div>
        <br>
        <a href="info.php" class="btn btn-success">Quay lại</a>
        <button type="submit" class="btn btn-success" name="btnSua">Lưu</button>
    </form>

<?php
    // Nếu gửi form cập nhật
    if (isset($_POST['btnSua'])) {
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];

        // Cập nhật thông tin sản phẩm
        $update_sql = "UPDATE info_users SET name = ?, gender  = ?, phone = ? WHERE user_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssi",$name,$gender,$phone,$user_id );

        if ($update_stmt->execute()) {
            echo "<p class='text-success'>Cập nhật thông tin thành công!</p>";
            header("Location: info.php");
            exit();
        } else {
            echo "<p class='text-danger'>Lỗi khi cập nhật thông tin!</p>";
        }
        $update_stmt->close();
    }
?>

</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>
