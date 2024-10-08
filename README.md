# kids.loc

## 1.Загрузка проекта на сервер
git clone https://github.com/babamurad/kids.loc.git /var/www/ваш-домен

## 2.Установка зависимостей через Composer
cd /var/www/ваш-домен
composer install --no-dev --optimize-autoloader

## 3.Настройка прав доступа
sudo chown -R www-data:www-data /var/www/ваш-домен  

sudo chmod -R 775 /var/www/ваш-домен/storage  

sudo chmod -R 775 /var/www/ваш-домен/bootstrap/cache  


## 4.Конфигурация .env файла
cp .env.example .env

## 5.Генерация ключа приложения
php artisan key:generate

## 6.Nginx:
server {
    listen 80;
    server_name ваш-домен;

    root /var/www/ваш-домен/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
