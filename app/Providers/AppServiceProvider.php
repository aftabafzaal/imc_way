<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Config;
use Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      //dd("DSfsdf");
      //  dd(Config::get('variable.URL_LINK'));
      $url=Request::segment(1);
      if(	$url == "en"){
        $language='en/';
        $lang='en';
      }elseif($url == "ar"){
          $language='ar/';
          $lang='ar';
      }else{
          $language='';
          $lang='en';
      }
      $get= Config::get('variable.URL_LINK');
      Config::set('variable.URL_LINK', $get.$language);
      Config::set('segment', $language);
      app()->setLocale($lang);
      
      if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
             \URL::forceScheme('https');
        }

    }
}
