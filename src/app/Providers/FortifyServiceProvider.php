<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\RegisterController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
;
use Laravel\Fortify\Http\Responses\RegisterResponse;
use App\Http\Responses\FortifyRegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
        $this->app->singleton(
            RegisteredUserController::class,
            RegisterController::class
        );

         $this->app->singleton(
            RegisterResponse::class,
            FortifyRegisterResponse::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class); //ユーザ新規登録

        //登録情報更新用除外 Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        //パスワード更新用除外 Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        //パスワードリセット用除外 Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string)$request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        /*２要素認証除外 RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        */

        //ビュー関係
        Fortify::registerView(function(){
            return view('register');
        });

        Fortify::loginView(function(){
            return view('login');
        });

        
    }
}
