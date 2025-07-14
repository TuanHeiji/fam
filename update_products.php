<?php 
session_start();
if (isset($_SESSION['mySession'])) {
    $user_id = $_SESSION['mySession'];
} else { 
    header("Location:login.php");
    exit();
}   
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
</head>

<body>
<section class="py-4" >
<div class="container py-4" style="width: 100%; max-width: 600px;  background-color: #E7F5DC; border-radius: 20px;">
<?php
    require "connect.php";
    mysqli_set_charset($conn, 'UTF8'); // sửa lỗi tiếng Việt

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Lấy dữ liệu sản phẩm theo ID
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $pass = $result->fetch_assoc();
        } else {
            $pass = null; // Không có bản ghi nào
            echo "<p>Sản phẩm không tồn tại.</p>";
            exit();
        }
        $stmt->close();
    }
?>

    <form method="post" action="">
        <div class="form-group">
            <label for="product_name">Tên nông sản:</label>
            <input type="text" class="form-control" name="product_name" value="<?php echo htmlspecialchars($pass['product_name']); ?>">
        </div>
        <div class="form-group">
            <label for="price">Giá cả:</label>
            <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($pass['price']); ?>">
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng (hoặc kg):</label>
            <input type="number" class="form-control" name="quantity" value="<?php echo htmlspecialchars($pass['quantity']); ?>">
        </div>
        <div class="form-group">
            <label for="description">Chất lượng:</label>
            <input type="text" class="form-control" name="description" value="<?php echo htmlspecialchars($pass['description']); ?>">
        </div>
        <div class="form-group">
            <label for="description">Chất lượng:</label>
            <input type="text" class="form-control" name="create_at" value="<?php echo htmlspecialchars($pass['create_at']); ?>">
        </div>
        <br>
        <a href="farmer.php?id=<?php echo $user_id; ?>" class="btn btn-success">Quay lại</a>
        <button type="submit" class="btn btn-success" name="btnSua">Lưu</button>
    </form>

<?php
    // Nếu gửi form cập nhật
    if (isset($_POST['btnSua'])) {
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $create_at = $_POST["create_at"];

        // Cập nhật thông tin sản phẩm
        $update_sql = "UPDATE products SET product_name = ?, price = ?, quantity = ?, description = ?, create_at = ? WHERE product_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("siisis", $product_name, $price, $quantity, $description, $product_id, $create_at);

        if ($update_stmt->execute()) {
            echo "<p class='text-success'>Cập nhật sản phẩm thành công!</p>";
            header("Location: farmer.php?id=$user_id");
            exit();
        } else {
            echo "<p class='text-danger'>Lỗi khi cập nhật sản phẩm!</p>";
        }
        $update_stmt->close();
    }
?>

</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>
