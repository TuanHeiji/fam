
<?php
session_start();
if (isset($_SESSION['mySession']) && isset($_SESSION['mySession_name'])) {
    $user_id = $_SESSION['mySession'];
    $username = $_SESSION['mySession_name'];
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
        <title>My Farm</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
    <style>
    a{
        text-decoration: none;
    }

    /* Tạo slow  */
    .navbar .nav-link {
           transition: color 0.3s ease;
    }

    /* Hiệu ứng hover màu trắng*/
    .navbar .nav-link:hover {
        color: white !important;
    
    }

    /* Menu đang active (giữ màu trắng) */
    .navbar .nav-link.active {
        color: white !important;  
    }

    /* Giữ dropdown menu mặc định */
    .navbar .dropdown-menu a:hover {
        background-color: #f8f9fa; /* Màu nền xám nhạt */
    }


    table {
        border-collapse: collapse;
        margin: 0 auto; 
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        text-align: left;
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
    
    .no-products {
        margin-top: 20px;
        font-family: Arial, sans-serif;
        color: #555;
        text-align: center;
    }


    .header {
    position: sticky;
    top: 0; /* Khoảng cách từ trên cùng */
    z-index: 1020; /* Đảm bảo menu nằm trên các phần tử khác */
    }   
    </style>
</head>
<body>
    <section class="header">
        <div class="myheader bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  d-flex justify-content-center align-items-center">
                        <a href="farmer.php?id=<?php echo $user_id; ?>">
                            <img src="pictures/logo.png" class="img-fruid" style="width: 100px; height: 100px;" alt="Logo">
                        </a>
                    </div>
    
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <form class="d-flex" role="search" method="post">
                            <input class="form-control me-2" type="search" name="name_search" value="<?php if (isset($_POST['name_search'])) echo $_POST['name_search']; ?>" placeholder="Bạn tìm nông sản gì?">
                            <button class="btn btn-success" type="submit" name="btn_search">Tìm</button>
                        </form>
                     </div>
    
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-md">
                                <a href="https://www.facebook.com/tuanheiji.204" target="_blank">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="fs-2 text-success">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-dark">
                                                Admin <br>
                                            </div>
                                            <strong class="text-success">Tuấn(Heiji)</strong>
                                        </div>
                                    </div>
                                </a>
                            </div>
    
                            <div class="col-md">
                                
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="fs-2 text-success">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-dark">
                                               Xin chào <br>
                                            </div>
                                            <strong class="text-success">
                                                <?php
                                                    echo $username;
                                                ?>
                                            </strong>
                                        </div>
                                    </div>
        
                            </div>
                            
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
        <div class="mymenu bg-success">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <nav class="navbar navbar-expand-lg bg-success">
                                <div class="container-fluid">
                                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-white-50" aria-current="page" href="farmer.php?id=<?php echo $user_id; ?>">Sản phẩm</a>
                                                </li>
        
                                                <li class="nav-item">
                                                    <a class="nav-link text-white-50" href="developing.php">Tin tức</a>
                                                </li>
        
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle text-white-50" href="#" 
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Cài đặt</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="info.php">Thông tin cá nhân</a></li>
                                                        <li><a class="dropdown-item text-danger" href="logout.php" name="logout">Đăng xuất</a></li>
                                                    </ul>
                                                </li>     
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
        </div>

    </section>
    
    <section class="myfunction my-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="btn btn-success">
                            <a href='insert_products.php' class='text-white'>Thêm mới</a>
                    </div>
                    <div class="btn btn-success">
                        <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
                            <a href='farmer.php?date=<?php echo date("d-m-Y"); ?>' class='text-white'>Hôm nay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mycontent my-4">
    <div class="container">
        <div class="row-md my-2 d-flex justify-content-center align-items-center">
            <?php 
                include "connect.php";
                // Kiểm tra xem có sản phẩm nào không
                $sql_check = "SELECT COUNT(*) FROM products WHERE user_id = ?";
                $stmt_check = $conn->prepare($sql_check);
                $stmt_check->bind_param("i", $user_id);
                $stmt_check->execute();
                $stmt_check->bind_result($count);
                $stmt_check->fetch();
                $stmt_check->close();
        
                if ($count == 0) {
                    echo "<p class='text-center'>Bạn chưa có sản phẩm nông sản nào! Vui lòng thêm mới!</p>";
                } else {
                    // Lấy danh sách các ngày duy nhất từ cột create_at
                    $sql_dates = "SELECT DISTINCT DATE(create_at) AS date FROM products WHERE user_id = ?";
                            // $sql_dates = "SELECT DISTINCT DATE(create_at) AS date 
                            // FROM products 
                            // WHERE user_id = ? 
                            // ORDER BY date ASC";
                    $stmt_dates = $conn->prepare($sql_dates);
                    $stmt_dates->bind_param("i", $user_id);
                    $stmt_dates->execute();
                    $result_dates = $stmt_dates->get_result();
        
                    $dates = [];
                    while ($row_date = $result_dates->fetch_assoc()) {
                        $date_stemp = $row_date['date'];
                        $dates[] = date('d-m-Y', strtotime($date_stemp));
    
                    }
                    $stmt_dates->close();
        
                    // Lấy ngày hiện tại từ URL hoặc mặc định là ngày đầu tiên
                    $current_date = isset($_GET['date']) ? $_GET['date'] : ($dates[0] ?? null);
        
                    if ($current_date) {
    
                        if(!empty($_POST['name_search'])){
                            $name_search = $_POST['name_search'];
                            // Tạo câu truy vấn với điều kiện LIKE
                            $sql = "SELECT * FROM products WHERE user_id=? AND product_name LIKE ?";
                            $stmt = $conn->prepare($sql);
    
                            // Thêm ký tự `%` để tìm kiếm bằng LIKE
                            $like_search = "%" . $name_search . "%";
                            $stmt->bind_param("is",$user_id, $like_search);
    
                            // Thực thi truy vấn
                            $stmt->execute();
                            $result = $stmt->get_result();
                        }
                        else{
                            // Truy vấn các sản phẩm thuộc ngày được chọn
                            $sql = "SELECT * FROM products WHERE user_id = ? AND DATE_FORMAT(create_at, '%d-%m-%Y') = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("is", $user_id, $current_date);
                            $stmt->execute();
                            $result = $stmt->get_result();
            
                            // Hiển thị phân trang
                            $current_index = array_search($current_date, $dates);
                            $per_page = 3;
                            $start_index = max(0, $current_index - 1);
                            $end_index = min(count($dates), $start_index + $per_page);
                            $current_page_dates = array_slice($dates, $start_index, $per_page);
            
                            echo "<nav aria-label='Page navigation'>";
                            echo "<ul class='pagination justify-content-center'>";
            
                            if ($start_index > 0) {
                                $previous_date = $dates[$start_index - 1];
                                echo "<li class='page-item'>
                                        <a class='page-link' href='?date=$previous_date' aria-label='Previous'>
                                            <span aria-hidden='true'>&laquo;</span>
                                        </a>
                                    </li>";
                            }
            
                            foreach ($current_page_dates as $date) {
                                $active = ($date == $current_date) ? "active" : "";
                                echo "<li class='page-item $active'>
                                        <a class='page-link' href='?date=$date'>$date</a>
                                    </li>";
                            }
            
                            if ($end_index < count($dates)) {
                                $next_date = $dates[$end_index];
                                echo "<li class='page-item'>
                                        <a class='page-link' href='?date=$next_date' aria-label='Next'>
                                            <span aria-hidden='true'>&raquo;</span>
                                        </a>
                                    </li>";
                            }
            
                            echo "</ul>";
                            echo "</nav>";
                        }
    
            ?>
        </div>
    
    <div class="row-md my-2">
        <div class="row-md">
            <?php
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered d-flex justify-content-center'>";
                    echo "
                        <tr class='table-success'>
                            <th>Thứ tự</th> 
                            <th>Tên nông sản</th>
                            <th>Giá(VND)</th>
                            <th>Số lượng(kg)</th>
                            <th>Chất lượng</th>
                            <th>Thời gian</th>
                            <th style='width: 40px; text-align: center'>Xóa</th>
                            <th style='width: 40px; text-align: center'>Sửa</th>
                        </tr>";

                    $counter = 1;   
                    while ($row = $result->fetch_assoc()) {

                        $time = $row['create_at']; 
                        $date = date('d-m-Y', strtotime($time));

                        echo "<tr>
                                <td>" . $counter . "</td>
                                <td>" . $row['product_name'] . "</td>
                                <td>" . $row['price'] . "</td>
                                <td>" . $row['quantity'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>" . $date . "</td>
                                <td style='text-align: center'>
                                    <a href='delete_products.php?id=" . $row['product_id'] . "'>
                                        <i class='fa-regular fa-trash-can text-danger'></i>
                                    </a>
                                </td>
                                <td style='text-align: center'>
                                    <a href='update_products.php?id=" . $row['product_id'] . "'>
                                        <i class='fa-solid fa-pencil text-success'></i>
                                    </a>
                                </td>
                            </tr>";
                        $counter++;
                    
                    }
                    echo "</table>";
          
                } else {
                    echo "<p class='text-center'>Không có sản phẩm nào! Vui lòng kiểm tra lại!</p>";
                }
                

                $stmt->close();
            }
        }   


            $conn->close();
        ?>
        </div>
        </div>
    </div>
    </section>


    <section class="myfooter text-white" style="background-color: #E7F5DC">
                <div class="container">
                    <div class="row">
                        <div class="col-sm d-flex justify-content-center">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a href="farmer.php?id=<?php echo $user_id; ?>" class="d-flex align-items-center">
                                                    <img src="pictures/logo.png" class="img-fruid" style="width: 100px; height: 100px;" alt="Logo">
                                                 </a>
                                            </div>
                                        </div>

                                         <div class="row">
                                             <div class="row">
                                                <p class="text-dark">Cơ quan chủ quản: Công ty Cổ phần công nghệ Tuấn Heiji</p>
                                             </div>
                                             <div class="row">
                                                <div class="col text-dark">
                                                    <p>
                                                        <i class="fa-solid fa-phone"></i>
                                                        Tel: 085.956.4979
                                                    </p>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col text-dark">
                                                    <p>
                                                        <i class="fa-solid fa-envelope"></i>
                                                        Email: ttanh311.dev@gmail.com
                                                    </p>
                                                </div> 
                                             </div>
                                         </div>
                                         <div class="row">
                                            <div>
                                                <a href="https://www.facebook.com/tuanheiji.204" target="_blank">
                                                    <i class=" fs-3 fa-brands fa-facebook text-primary"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fs-3 fa-brands fa-tiktok text-dark"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fs-3 fa-brands fa-youtube text-danger"></i>
                                                </a>
                                            </div>
                                            <p class="text-dark">© 2023-2024 myfarm.vn</p>                                    
                                         </div>
                                    </div>                      
                        </div>
                        <div class="col-sm d-flex justify-content-center">
                            <p class="py-4 text-dark">
                                <i class="fa-solid fa-location-dot"></i>
                                Trụ sở: Thôn Yên Chỉ - X.Thượng Hòa - H.Nho Quan - Ninh Bình
                                <br> <br>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3298.971546889599!2d105.7766821945298!3d20.29682378166068!3m2!1i1024!2i768!4f13.1!5e1!3m2!1svi!2s!4v1732795870271!5m2!1svi!2s" 
                                width="100%" height="300px" allowfullscreen loading="lazy"
                                referrerpolicy="no-referrer-when-downrage" style="border: none;" >
                                </iframe>        
                            </p>  
                        </div>
                    </div>
                </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

        