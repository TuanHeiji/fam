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
    <title>Thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
    <style>
        
        table {
            border-collapse: collapse;
            width: 50%; 
            margin: 0 auto; 
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        a{
            text-decoration: none; 
        }
    </style>
</head>


<body class="py-4">

    <?php
        include "connect.php";
    
        $sql = "
            SELECT 
                info_users.name, 
                info_users.gender, 
                info_users.phone 
            FROM 
                info_users
    
            INNER JOIN 
                users 
            ON 
                info_users.user_id = users.user_id
                
            WHERE 
                users.user_id = ?
        ";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    ?>

<section class="container" style="width: 100%; max-width: 800px; background-color: #E7F5DC; border-radius: 20px;">
    <div>
        <div class="row">
            <div class="col-sm py-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-success">
                    <?php
                        if(!empty($_SESSION['mySessionAdmin'])){
                            $link = "admin.php";
                        }
                        else{

                            $link = "farmer.php";
                        }
                    ?>
                    <a href="<?php echo $link;?>?id=<?php echo $user_id; ?>" class="text-white">Quay lại</a>
                </button>
            </div>
            
            <div class="col-sm py-3 d-flex justify-content-center align-items-center">

                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Chỉnh sửa
                    </button>
                    <ul class="dropdown-menu">
                        <?php 
                            if ($result->num_rows > 0){
                                echo '
                                  <li><a class="dropdown-item" href="update_info.php?id=<?php echo $user_id;?>">Sửa thông tin</a></li>
                                
                                ';
                            }
                            else {
                                echo '
                                    <li><a class="dropdown-item" href="insert_info.php?id=<?php echo $user_id;?>">Thêm thông tin</a></li>
                                    <li><a class="dropdown-item" href="update_info.php?id=<?php echo $user_id;?>">Sửa thông tin</a></li>
                                ';

                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
     
    </div>
    <br>
    <div class="pb-3">
        
        <?php
    
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    
                </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['phone'] . "</td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='d-flex justify-content-center align-items-center'>Bạn chưa có thông tin! Vui lòng thêm!</p>";
        }
    
        // Đóng kết nối
        $stmt->close();
        $conn->close();
        ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body>
</html>
