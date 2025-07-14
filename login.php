<!DOCTYPE html>
<html lang="vi">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="pictures/logo.png"/>
    <style>
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        .toggle-password {
            position: absolute;
            top: 40%;
            right: 0;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>

<?php
    include "connect.php";
   
    session_start();
    if (isset($_POST['index'])) {
        header('Location: index.php');
        exit();
    }
    $error = "";
    if (isset($_POST['login'])) {
        if(empty($_POST['username']) && empty($_POST['password'])){
            $error = "Không được để trống thông tin!";
        }
        else{
            $user = $_POST['username'];
            $pass = $_POST['password'];
    
    
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $user, $pass);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($row['role'] === 'admin') {
                    $user_id = $row['user_id'];  
                    $_SESSION['mySessionAdmin'] = $user_id;
                    $_SESSION['mySession_nameAdmin'] = $user;
                    header("location:admin.php?id=".$row['user_id']);
                    exit();
                } else {
                    $user_id = $row['user_id'];
                    $_SESSION['mySession'] = $user_id;
                    $_SESSION['mySession_name'] = $user;
                     header("location:farmer.php?id=".$row['user_id']);
                    exit();
                }
            } else {
                $error = "Xin lỗi, bạn nhập không đúng tên tài khoản hoặc mật khẩu!";
            }
            $stmt->close();
        }
    }
    $conn->close();
?>

<body style="background-color: #E7F5DC">

    <div class="container">
        <div class="row">
            <div class="col-md">
                <a href="login.php">
                    <img src="pictures/logo.png" class="img-fruid" style="width: 100%; height: 100%;" alt="Logo">  
                </a>
            </div>

            <div class="col-md d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="card p-4" style="width: 100%; max-width: 400px; background: white; color: #000;">
                <a href="index.php" class="close-btn">&times;</a>
                <h2 style="color: green; font-family: Arial; font-weight: bold;">Đăng nhập</h2><br>
                <form action="login.php" method="POST">

                    <div>
                            <p>Nếu chưa có tài khoản, <a href="register.php" class="text-success" style="text-decoration: none">đăng ký</a></p>
                    </div>
                   
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản">
                        <label for="username">Tên tài khoản</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" style="width: 90%" id="password" name="password" placeholder="Mật khẩu">
                        <label for="password">Mật khẩu</label>
                        <span class="toggle-password" onclick="togglePassword()">🙉</span>
                    </div> 
                    <div>
                        <?php if (isset($error)): ?>
                            <div>
                                <small class="text-danger" style="font-size: 12px"><?php echo $error; ?></small>
                            </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-sm"  name="login">Đăng nhập</button>
                        <button type="submit" class="btn btn-success btn-sm"  name="index">Quay lại</button>
                    </div>    
                </form>
                </div>
            </div>
        </div>
    </div>

    
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; 
                toggleIcon.textContent = '🙈'; 
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '🙉'; 
            }

            
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>
