# How to run

Đầu tiên, mở command window ở thư mục be.
<pre><code>> composer install</code></pre>
Copy file .env.example và đổi tên thành .env

Thay đổi các thông tin trong file .env để liên kết với CSDL tương ứng
    <pre><code>DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=datvexemphim
    DB_USERNAME=root
    DB_PASSWORD=</code></pre>

Tạo APP_KEY cho file .env
<pre><code>> php artisan key:generate</code></pre>

Migrate database bằng lệnh
<pre><code>> php artisan migrate</code></pre>

Tạo JWT_KEY tương ứng cho JWT
<pre><code>> php artisan jwt:secret</code></pre>

Chạy project
<pre><code>> php -S localhost:8888 -t public</code></pre>

Đăng ký tài khoản thông qua front-end, sau đó vào phpmyadmin sửa tài khoản như sau để có tài khoản quản trị viên:
<pre><code>maLoaiNguoiDung: QuanTri
staff: 1</code></pre>