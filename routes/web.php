<?php

use App\Mail\TicketConfirmMail;
use Illuminate\Support\Facades\Mail;

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


Auth::routes();

//HOME
Route::get('/', 'PagesController@index')->name('index');
Route::get('/search', 'PagesController@search')->name('search');


//User Controller
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::post('/profile', 'UserController@profileSave')->name('profile.save');
Route::get('/profile/password', 'UserController@profilePassword')->name('user.password');
Route::post('/profile/password', 'UserController@PasswordChange')->name('profile.password');

//EVENTS
Route::get('/events', 'EventsController@index')->name('event.all');
Route::get('/events/{slug}', 'EventsController@EventDetails')->name('event.view');
Route::post('/events/book', 'EventsController@Book')->name('event.book');
Route::get('/search/events', 'EventsController@search')->name('event.search');
Route::get('/myticket', 'TicketController@index')->name('myticket');
Route::get('/book', 'BookController@index')->name('book.index');
Route::post('/book', 'BookController@checkout')->name('book.checkout');




//Session Testing
Route::get('/session_all', function(){
    return request()->session()->all();
});

//Session Testing
Route::get('/flush', function(){
    return request()->session()->flush();
});

Route::get('/b-success', function(){
    return view('events.booking-successful');
});

Route::get('/ticket', 'ticketController@ticket');

// Route::get('/send', function(){
//     Mail::to('test@test.com')->send(new TicketConfirmMail());
// });

Route::get('/mail-test', 'ticketController@mail');

Route::get('/sms', 'BookController@sendSms');
