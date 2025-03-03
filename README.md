# お問い合わせフォーム  

## 環境構築  
Dockerビルド  
1.git clone git@github.com:AKIOYAMADA408942/check-test_contact-form.git  
2 docker compose up -d --build  
*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-copose.ymlファイルを編集してください。  
  
## Laravel環境構築  
1 docker compose exec php bash   
2 composer install  
3 .env.exampleファイルから.envを作成し、環境変数を変更  
4 composer require laravel/fortify  
5 php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"  
6 php artisan migrate  
7 php artisan db:seed  
8 php artisan key:generate  

## 使用技術
・PHP7.4  
・Laravel8.8  
・Laravel Fortify  
・Laravel Livewire  
・MySQL8.0  


##URL
・開発環境 : http://localhost/  
・phpMyadmin : http://localhost:8080/
