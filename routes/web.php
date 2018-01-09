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
    return view('frontend.home');
});

Route::view('/contact-us','frontend.contact_us');
Route::view('/about-us','frontend.about_us');
Route::view('/register-login','frontend.register_login');
Route::view('/log', 'frontend.online_payment');
Route::view('/logs', 'frontend.online_payment');
Route::view('/bookings','frontend.bookings');
Route::view('flight-bookings','frontend.flight_bookings');

Route::get('/logout','Auth\LoginController@logout');


Route::post('/subscribe','FrontEndController@subscribe');
Route::post('/message','FrontEndController@message');
Route::post('/tokenRefresh','FrontEndController@tokenRefresh');
Route::post('/pageTimeOut','FrontEndController@pageTimeOut');
Route::post('/requery','FrontEndPaymentController@interswitchRequery');


Route::get('typeaheadJs', 'FlightController@typeaheadJs')->name('typeaheadJs');
Route::view('/flights', 'frontend.flights.deals');
Route::post('/searchFlight','FlightController@searchFlight');
Route::post('/multiCitySearch','FlightController@multiCitySearch');
Route::get('/available-flights','FlightController@availableFlights');
Route::post('/passengerDetailsRQ','FlightController@flightCreatePNR');
Route::get('/flight-booking-payment-methods','FlightController@flightPaymentPage');
Route::post('/flightBookPricing','FlightController@flightBookPricing');
Route::get('/flight-passenger-details', 'FlightController@flightPassengerDetails');
Route::get('/flight-booking-complete', 'FrontEndPaymentController@bookingComplete');

Route::post('/searchHotel','HotelController@searchHotel');
Route::get('/available-hotels', 'HotelController@availableHotels');
Route::post('/hotelPropertyDescription', 'HotelController@hotelPropertyDescription');
Route::get('/hotel-information', 'HotelController@selectedHotel');
Route::view('/hotels', 'frontend.hotels.deals');



Route::post('/initiatePaystack','FrontEndPaymentController@initiatePaystack');
Route::post('/saveTransaction','FrontEndPaymentController@saveTransaction');

Route::get('/flight-booking-confirmation','FrontEndPaymentController@flightPaymentConfirmationPaystack');
Route::post('/flight-booking-confirmation','FrontEndPaymentController@flightPaymentConfirmationInterswitch');
Route::get('/hotel-booking-confirmation','FrontEndPaymentController@hotelPaymentConfirmationPaystack');
Route::post('/hotel-booking-confirmation','FrontEndPaymentController@hotelPaymentConfirmationInterswitch');
Route::get('/package-booking-confirmation','FrontEndPaymentController@packagePaymentConfirmationPaystack');
Route::post('/package-booking-confirmation','FrontEndPaymentController@packagePaymentConfirmationInterswitch');



Route::view('/test', 'backend.test');
Route::prefix('backend')->group(function (){
    Route::view('home', 'backend.home')->name('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
