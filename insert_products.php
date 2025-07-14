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
    <title>Thêm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
</head>
<body>
<section class="py-4" >
<div class="container py-4 " style="width: 100%; max-width: 600px;  background-color: #E7F5DC; border-radius: 20px;">
<?php
	require 'connect.php';	
	mysqli_set_charset($conn, 'UTF8');
    ?>

<form method="post" action="">
<div class="form-group">
	<label for="product_name">Tên nông sản:</label>
	<input type="text" class="form-control" name="product_name">
</div>
<div class="form-group">
	<label for="price">Giá cả:</label>
	<input type="number" class="form-control" name="price">
</div>
<div class="form-group">
	<label for="quantity">Số lượng(hoặc kg):</label>
	<input type="number" class="form-control" name="quantity">
</div>
<div class="form-group">
	<label for="description">Chất lượng:</label>
	<input type="text" class="form-control" name="description">
</div>

<br>
<a href="farmer.php?id=<?php echo $user_id; ?>" class="btn btn-success">Quay lại</a>
<button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>

</form>

<?php
	// thêm dữ liệu
	if (isset($_POST['btn_insert']))
	{
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];

        // Câu lệnh SQL để chèn dữ liệu
        $sql = "INSERT INTO products (product_name, price, quantity, description, user_id) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiss", $product_name, $price, $quantity, $description, $user_id);

        if ($stmt->execute()) {
            echo "Dã thêm nông sản thành công!";
        } else {
            echo "Lỗi: " . $stmt->error;
        }
        
		header("location: farmer.php?id=<?php echo $user_id; ?>");

        $stmt->close();
    }	
		
	$conn->close();
	
?>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body>
</html>