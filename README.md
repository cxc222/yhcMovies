项目还在开发中.很快会出第一版;

安装
1. composer install
2. npm install
3. 创建 .env 文件 (参考 .env.example)
4. 执行 php artisan key:generate
5. 执行 php artisan migrate
6. 设置管理员信息在 UserTableSeeder.php 文件中
7. 执行 php artisan db:seed
8. 执行 gulp 或者 gulp watch (首页要安装 gulp (sudo npm install -g gulp))
