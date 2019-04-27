<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sms',function(){
    $user=\App\User::firstOrFail();
    $user->notify(new \App\Notifications\SmsNexmo());
    return "send";
});

Route::get('onesignal',function(){
    OneSignal::sendNotificationToAll("El Laracamp ha comenzado", $url = null, $data = null);
    return "send";
});


Route::get('telegram', function(){
    Telegram::sendMessage([
        'chat_id' => '-1001237483106',
        'parse_mode' => 'HTML',
        'text' => '<b>Hola</b> Participantes de LARACAMP 
                <a href="https://laracamp.sat-dev.com/wp-content/uploads/2019/04/slide1.jpg">FOTO</a>'
    ]);
});

// 'chat_id' => '-1001237483106',
