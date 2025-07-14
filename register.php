<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    include 'connect.php';
    // if (isset($_POST['login'])) {
    //     header('Location: login.php');
    //     exit();
    // }
    $error = "";
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email']) && isset($_POST['role']) ){

        if (empty($_POST['username']) && empty($_POST['password']) && empty($_POST['confirm_password']) && empty($_POST['email'])) {
            $error = "Không được để trống thông tin!";
        }
        else{
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];
            $role = $_POST['role'];
        
        
            $sql = "SELECT * FROM users WHERE username='$user'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1){
                $error = "Tài khoản đã tồn tại!";
            }
        
            else {
                if(trim($confirm_password) !== trim($pass)){
                    $error_confirm_password = "Nhập lại mật khẩu không khớp!";
                }
        
                else {
                    if($role == 'admin'){
                        $successfully_admin = "Yêu cầu của bạn đang được xem xét. Vui lòng đợi 24 giờ!";
                        $sql = "INSERT INTO account (username, password, email, role) VALUES ('$user', '$pass', '$email', '$role')";
                        $conn->query($sql);
                    }
                    else {
                        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $user, $pass, $email, $role);
                        $stmt->execute();
                        
                         if ($stmt->affected_rows > 0) {
                            $successfully ="Bạn đã đăng ký thành công, vui lòng quay lại để đăng nhập!";
                            
                        } else {
                        echo "Error: " . $stmt . "<br>" . $conn->error;
                        }
                        $stmt->close();
                    }
                }
            }
        }
    }  
    $conn->close();
?>

<body style="background-color: #E7F5DC">
        <div class="container">
        <div class="row">
            <div class="col-md">
                <a href="register.php">
                    <img src="pictures/logo.png" class="img-fruid" style="width: 100%; height: 100%;" alt="Logo">  
                </a>
            </div>

            <div class="col-md d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="card p-4" style="width: 100%; max-width: 400px; background: white; color: #000;">
                <a href="login.php" class="close-btn">&times;</a>
                <h2 style="color: green; font-family: Arial; font-weight: bold;">Đăng ký</h2><br>

                <form id="registerForm" action="" method="POST">

                    <div>
                        <?php if (isset($successfully)): ?>
                            <div>
                                <small class="text-success" style="font-size: 12px"><?php echo $successfully; ?></small>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <?php if (isset($successfully_admin)): ?>
                            <div>
                                <small class="text-success" style="font-size: 12px"><?php echo $successfully_admin; ?></small>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <?php if (isset($error)): ?>
                            <div>
                                <small class="text-danger" style="font-size: 12px"><?php echo $error; ?></small>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
                        <label for="username">Tên đăng nhập</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" style="width: 90%" id="password" name="password" placeholder="Mật khẩu">
                        <label for="password">Mật khẩu</label>
                        <span class="toggle-password" onclick="togglePassword()">🙉</span>
                    </div> 

                    <div>
                        <?php if (isset($error_confirm_password)): ?>
                            <div>
                                <small class="text-danger" style="font-size: 12px"><?php echo $error_confirm_password; ?></small>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <label for="username">Email</label>
                    </div>

                    <div>
                        <select class="form-select" name="role">
                            <option value="farmer">Nông dân</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <br>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-sm"  name="signup">Tạo tài khoản</button>
                        <a class="btn btn-success btn-sm" href="login.php">Quay lại</a>
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


        
        document.getElementById('registerForm').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        
        // Kiểm tra độ dài mật khẩu
        if (password.length < 8) {
                event.preventDefault(); // Ngăn không cho form submit
                alert("Mật khẩu phải có ít nhất 8 ký tự!");
            }
        });
        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    
</body>
</html>