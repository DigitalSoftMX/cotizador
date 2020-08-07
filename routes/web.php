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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
	Route::post('/fechas', 'HomeController@fechas');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

/*Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


//rutas para conseguir los menus
//Route::get('/home', 'MenuController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// rutas de actividades
Route::group(['middleware' => 'auth'], function () {
	Route::resource('actividades','LoginActController');
});

// rutas de competidores
Route::group(['middleware' => 'auth'], function () {
	Route::resource('competencia','CompetitionController');
	Route::post('competencia/create','CompetitionController@create');
	Route::get('competencia/edit/{id}','CompetitionController@edit')->name('competencia.edit');
	Route::post('competencia/update/{id}','CompetitionController@update')->name('competencia.update');
	Route::post('competencia/store','CompetitionController@store');
	Route::post('competencia/edit', 'CompetitionController@edit');
	Route::post('competencia/competencia_selec', 'CompetitionController@competencia_selec');
	Route::post('competencia/calendario_edit_pemex', 'CompetitionController@calendario_edit_pemex');
});


// rutas de policon
Route::group(['middleware' => 'auth'], function () {
	Route::resource('policon','PoliconController');
	Route::post('policon/create','PoliconController@create');
	Route::get('policon/edit/{id}','PoliconController@edit')->name('policon.edit');
	Route::post('policon/update/{id}','PoliconController@update')->name('policon.update');
	Route::post('policon/store','PoliconController@store');
	Route::post('policon/edit', 'PoliconController@edit');
	Route::post('policon/policon_selec', 'PoliconController@policon_selec');
	Route::post('policon/calendario_edit_policon', 'PoliconController@calendario_edit_policon');
});


// rutas de impulsa
Route::group(['middleware' => 'auth'], function () {
	Route::resource('impulsa','ImpulsaController');
	Route::post('impulsa/create','ImpulsaController@create');
	Route::get('impulsa/edit/{id}','ImpulsaController@edit')->name('impulsa.edit');
	Route::post('impulsa/update/{id}','ImpulsaController@update')->name('impulsa.update');
	Route::post('impulsa/store','ImpulsaController@store');
	Route::post('impulsa/edit', 'ImpulsaController@edit');
	Route::post('impulsa/impulsa_selec', 'ImpulsaController@impulsa_selec');
	Route::post('impulsa/calendario_edit_impulsa', 'ImpulsaController@calendario_edit_impulsa');
});


// rutas de estaciones
Route::group(['middleware' => 'auth'], function () {
	Route::resource('estaciones','EstacionController');
	Route::post('estaciones/edit', 'EstacionController@edit');
});

// rutas terminales
Route::group(['middleware' => 'auth'], function () {
	Route::resource('terminales','TerminalController');
	Route::post('terminales/update/{id}','TerminalController@update')->name('terminales.update');
	Route::post('terminales/create','TerminalController@create');
	Route::post('terminales/store','TerminalController@store');
	Route::delete('terminales/destroy/{id}','TerminalController@destroy')->name('terminales.destroy');
});

//rutas pemex
Route::group(['middleware' => 'auth'], function () {
	Route::resource('pemex','PemexController');
	Route::post('pemex/create','PemexController@create');
	Route::post('pemex/store','PemexController@store');
});

// rutas terminales
Route::group(['middleware' => 'auth'], function () {
	Route::resource('fits','FitController');
	Route::post('fits/update/{id}','FitController@update')->name('fits.update');
	Route::post('fits/create','FitController@create');
	Route::post('fits/store','FitController@store');
	Route::delete('fits/destroy/{id}','FitController@destroy')->name('fits.destroy');
});

//rutas cotizador
Route::group(['middleware' => 'auth'], function () {
	Route::resource('cotizador','QuoteController');
	Route::post('cotizador/store','QuoteController@store');
	Route::any('cotizador_sele', 'QuoteController@cotizador_sele');
	Route::any('calendario_selec', 'QuoteController@calendario_selec');
	Route::any('calendario_edit', 'QuoteController@calendario_edit');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('table_descount','DiscountController');
	Route::post('table_descount/create','DiscountController@create');
	Route::post('table_descount/store','DiscountController@store');
});

//rutas cotizador
Route::group(['middleware' => 'auth'], function () {
	Route::any('flete', 'QuoteController@flete');
});


//Route::get('estaciones', ['as' => 'estaciones.index', 'uses' => 'EstacionController@index']);
//Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	//Route::get('estaciones', ['as' => 'estaciones.index', 'uses' => 'EstacionController@index']);
	//Route::get('estaciones', ['as' => 'estaciones.edit', 'uses' => 'EstacionController@edit']);
	//Route::put('estaciones', ['as' => 'estaciones.update', 'uses' => 'ProfileController@update']);
//});

