<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Farme</title>
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
                <div class="col-md-3  d-flex justify-content-center align-items-center">
                    <a href="index.php">
                        <img src="pictures/logo.png" class="img-fruid" style="width: 100px; height: 100px;" alt="Logo">
                    </a>
                </div>

                <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" name="name_search" placeholder="Bạn tìm nông sản gì?">
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
                            <a href="login.php">
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
                                        <strong class="text-success">Đăng nhập</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mymenu bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4"></div> 
                    <div class="col-md-4">
                        <nav class="navbar navbar-expand-lg bg-success">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active text-white-50" aria-current="page" href="index.php">Trang chủ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white-50" href="need_login.php">Sản phẩm</a>
                                            </li>
    
                                            <li class="nav-item">
                                                <a class="nav-link text-white-50" href="need_login.php">Tin tức</a>
                                            </li>
    
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-white-50" href="#" 
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Cài đặt</a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="need_login.php">Thông tin cá nhân</a></li>
                                                    <li><a class="dropdown-item" href="need_login.php">Ngôn ngữ</a></li>
                                                    <li><a class="dropdown-item" href="need_login.php">Báo cáo</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="need_login.php">Đăng xuất</a></li>
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

    <section class="mycontent my-4">
         <div class="container">
            <div class="slider my-4">
            <div class="container py-4 px-4 pb-4">
                <h1 class="text-center">SẢN PHẨM <span class="text-success">NỔI BẬT</span></h1>
                <div class="row row-cols-2 row-cols-md-5 g-3">
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/cu-cai-trang.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Củ cải trắng</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/cachua.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Cà chua</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/duahau.png" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Dưa hấu</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/thitbo.png" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Thịt bò</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/carot.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Cà rốt</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/gao.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Gạo</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/thitga.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Thịt gà</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/xoai.png" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Xoài</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/trungga.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Trứng gà</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow border-0 text-center p-3" style="height: 150px;">
                            <img src="pictures/caibap.jpg" class="card-img-top mx-auto" alt="nông sản" style="max-height: 80px; object-fit: contain;">
                            <p class="mt-2 mb-0">Cải bắp</p>
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <div class="slider my-4">
                <div class="container px-4 py-4 pb-4">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="pictures/poster1.jpg"  class="d-block w-100" alt="poster1">
                        </div>
                        <div class="carousel-item">
                        <img src="pictures/poster2.jpg"  class="d-block w-100" alt="poster2">
                        </div>
                        <div class="carousel-item">
                        <img src="pictures/poster3.jpg"  class="d-block w-100" alt="poster3">
                        </div>
                        <div class="carousel-item">
                        <img src="pictures/poster4.jpg"  class="d-block w-100" alt="poster4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div>
            </div> 

            <div class="slider my-4" style="width: 100%; height: auto; border-radius: 20px;">
                <div class="container px-4 py-4 pb-4 text-center">
                    <h1>ĐỐI TÁC <span class="text-danger">CỦA MYFARM</span></h1>
                    <div class="row mt-4">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3 shadow-sm bg-white rounded flex justify-center">
                                <img src="pictures/momo.png" alt="MoMo" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3 shadow-sm bg-white rounded flex justify-center">
                                <img src="pictures/tiktok.png" alt="TikTok" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3 shadow-sm bg-white rounded flex justify-center">
                                <img src="pictures/vnpay.png" alt="VNPay" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3 shadow-sm bg-white rounded flex justify-center">
                                <img src="pictures/vnpt.png" alt="Vnpt" class="img-fluid">
                            </div>
                        </div>
                    </div>
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
                                                <a href="index.php" class="d-flex align-items-center">
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