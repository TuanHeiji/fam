# Tên Dự Án

Tên dự án: "Website quản lý nông sản đơn giản bằng PHP + MySQL"

## Công nghệ sử dụng

- PHP
- MySQL
- HTML5
- CSS: Bootstrap
- XAMPP (chạy máy chủ ảo)

## Cấu trúc dự án
```
fam/
│
├── pictures/                   # Thư mục lưu ảnh
│
├── index.php                   # Trang chủ
├── admin.php                   # Trang quản lý của admin
├── farmer.php                  # Trang quản lý nông sản của farmer
├── connect.php                 # Kết nối với database
├── developing.php              # Trang hiển thị các tính năng đang phát triển
├── info.php                    # Trang hiển thị thông tin người dùng
│
├── delete_product.php          # Xóa sản phẩm
├── delete_users.php            # Xóa người dùng (tính năng của admin)
│
├── insert_admin.php            # Thêm admin cho website
├── insert_info.php             # Thêm thông tin người dùng
├── insert_products.php         # Thêm sản phẩm nông sản (tính năng của farmer)
│
├── update_info.php             # Sửa thông tin người dùng
├── update_products.php         # Sửa sản phẩm nông sản (tính năng của farmer)
│
├── register.php                # Đăng ký
├── login.php                   # Đăng nhập
├── logout.php                  # Đăng xuất
├── need_login.php              # Trang yêu cầu đăng nhập
│
├── database/                          
│   └── farmerandmarkets.sql    # File SQL mẫu để import dữ liệu
│ 
└── README.md                   # File mô tả dự án
```
## Cách chạy dự án

1. Clone project:
- git clone https://github.com/your-username/your-project.git

2. Mở XAMPP, bật Apache và MySQL.

3. Đặt thư mục fam\ dự án vào: 
- C:\xampp\htdocs\

4. Import file SQL vào phpMyAdmin:
- Truy cập: http://localhost/phpmyadmin
- Tạo database mới tên là farmerandmarkets
- Import file farmerandmarkets.sql trong thư mục dự án

5. Truy cập dự án
- http://localhost/fam/index.php


## Tác giả

Tuấn Heiji