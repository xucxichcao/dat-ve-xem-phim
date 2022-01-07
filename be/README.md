# How to run

Đầu tiên, mở command window ở thư mục be.
<pre><code>composer install</code></pre>
Copy file .env.example và đổi tên thành .env

Tạo APP_KEY cho file .env
<pre><code>php artisan key:generate</code></pre>

Import CSDL trong file datvexemphim.sql

Thay đổi các thông tin trong file .env để liên kết với CSDL tương ứng
    <pre><code>DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=datvexemphim
    DB_USERNAME=root
    DB_PASSWORD=</code></pre>

Tạo JWT_KEY tương ứng cho JWT
<pre><code>php artisan jwt:secret</code></pre>

Cuối cùng là chạy project
<pre><code>php -S localhost:8888 -t public</code></pre>