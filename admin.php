
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
                        <a href="admin.php?id=<?php echo $user_id; ?>">
                            <img src="pictures/logo.png" class="img-fruid" style="width: 100px; height: 100px;" alt="Logo">
                        </a>
                    </div>
    
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <form class="d-flex" role="search" method="post">
                            <input class="form-control me-2" type="search" name="name_search" value="<?php if (isset($_POST['name_search'])) echo $_POST['name_search']; ?>" placeholder="Bạn tìm tài khoản gì?">
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
                                                    <a class="nav-link active text-white-50" aria-current="page" href="admin.php?id=<?php echo $user_id; ?>">Trang chủ</a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link text-white-50" href="#">Báo cáo</a>
                                                </li>
        
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle text-white-50" href="#" 
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Cài đặt</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="info.php">Thông tin cá nhân</a></li>
                                                        <li><hr class="dropdown-divider"></li>
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
                            <a href='insert_admin.php' class='text-white'>Thêm admin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mycontent">
    <div class="container py-4 my-4">    
        <?php
            include "connect.php";
            if(empty($_POST['name_search'])){
                // Thiết lập số bản ghi mỗi trang
                $records_per_page = 5;

                // Tính tổng số trang
                $sql_count = "SELECT COUNT(*) AS total FROM users WHERE role = 'farmer'";
                $result_count = $conn->query($sql_count);
                $total_records = $result_count->fetch_assoc()['total'];
                $total_pages = ceil($total_records / $records_per_page);

                // Lấy trang hiện tại từ URL, mặc định là 1
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                if ($current_page < 1) $current_page = 1;

                // Tính vị trí bắt đầu
                $start_from = ($current_page - 1) * $records_per_page;

        ?>
    <div class="row-md my-2 d-flex justify-content-center align-items-center">    
        <nav>
            <ul class="pagination">
                <?php
                        // Nút "Trang trước"
                        if ($current_page > 1) {
                            $prev_page = $current_page - 1;
                            echo "<li class='page-item'>
                                    <a class='page-link' href='?page=$prev_page'>Trước</a>
                                </li>";
                        }

                        // Các nút số trang
                        for ($i = 1; $i <= $total_pages; $i++) {
                            $active_class = $i === $current_page ? "active" : "";
                            echo "<li class='page-item $active_class'>
                                    <a class='page-link' href='?page=$i'>$i</a>
                                </li>";
                        }

                        // Nút "Trang sau"
                        if ($current_page < $total_pages) {
                            $next_page = $current_page + 1;
                            echo "<li class='page-item'>
                                    <a class='page-link' href='?page=$next_page'>Sau</a>
                                </li>";
                        }
                ?>
            </ul>
        </nav>
    </div> 
    <div class="row-md my-2 d-flex justify-content-center align-items-center">
        <?php
            // Lấy dữ liệu cho trang hiện tại
            $sql = "SELECT * FROM users WHERE role = 'farmer' LIMIT $start_from, $records_per_page";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped table-hover'  style='max-width: 800px; width: 100%'>";
                echo "<thead class='table-dark'>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên tài khoản</th>
                            <th>Vai trò</th>
                            <th>Email</th>
                            <th  style='width: 40px'>Cấm</th>
                        </tr>
                      </thead>";
                $counter = 1;
                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$counter}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['role']}</td>
                            <td>{$row['email']}</td>
                            <td class='text-center'>
                                <a href='delete_users.php?id={$row['user_id']}' class='btn btn-danger btn-sm'>
                                    <i class='fa-solid fa-user-slash'></i>
                                </a>
                            </td>
                          </tr>";
                          $counter++;
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning text-center'>Không có người dùng.</div>";
            }
         }
        else {  
        ?>
        <?php
            $name_search = $_POST['name_search'];
                // Tạo câu truy vấn với điều kiện LIKE
                $sql = "SELECT * FROM users WHERE username LIKE ?";
                $stmt = $conn->prepare($sql);

                // Thêm ký tự `%` để tìm kiếm bằng LIKE
                $like_search = "%" . $name_search . "%";
                $stmt->bind_param("s", $like_search);

                // Thực thi truy vấn
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-bordered table-striped table-hover'  style='max-width: 800px; width: 100%'>";
                    echo "<thead class='table-dark'>
                            <tr>
                               
                                <th>Tên tài khoản</th>
                                <th>Vai trò</th>
                                <th>Email</th>
                                <th  style='width: 40px'>Cấm</th>
                            </tr>
                        </thead>";
                   
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                
                                <td>{$row['username']}</td>
                                <td>{$row['role']}</td>
                                <td>{$row['email']}</td>
                                <td class='text-center'>
                                    <a href='delete_users.php?id={$row['user_id']}' class='btn btn-danger btn-sm'>
                                        <i class='fa-solid fa-user-slash'></i>
                                    </a>
                                </td>
                            </tr>";
                            
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<div class='alert alert-warning text-center'>Không có người dùng.</div>";
                }
                
                $stmt->close();   
        }
            $conn->close();
        ?>
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