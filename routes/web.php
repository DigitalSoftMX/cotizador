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

// rutas de hamse
Route::group(['middleware' => 'auth'], function () {
	Route::resource('hamse','HamseController');
	Route::post('hamse/create','HamseController@create');
	Route::get('hamse/edit/{id}','HamseController@edit')->name('hamse.edit');
	Route::post('hamse/update/{id}','HamseController@update')->name('hamse.update');
	Route::post('hamse/store','HamseController@store');
	Route::post('hamse/edit', 'HamseController@edit');
	Route::post('hamse/hamse_selec', 'HamseController@hamse_selec');
	Route::post('hamse/calendario_edit_hamse', 'HamseController@calendario_edit_hamse');
});

// rutas de potesta
Route::group(['middleware' => 'auth'], function () {
	Route::resource('potesta','PotestaController');
	Route::post('potesta/create','PotestaController@create');
	Route::get('potesta/edit/{id}','PotestaController@edit')->name('potesta.edit');
	Route::post('potesta/update/{id}','PotestaController@update')->name('potesta.update');
	Route::post('potesta/store','PotestaController@store');
	Route::post('potesta/edit', 'PotestaController@edit');
	Route::post('potesta/potesta_selec', 'PotestaController@potesta_selec');
	Route::post('potesta/calendario_edit_potesta', 'PotestaController@calendario_edit_potesta');
});

// rutas de energo
Route::group(['middleware' => 'auth'], function () {
	Route::resource('energo','EnergoController');
	Route::post('energo/create','EnergoController@create');
	Route::get('energo/edit/{id}','EnergoController@edit')->name('energo.edit');
	Route::post('energo/update/{id}','EnergoController@update')->name('energo.update');
	Route::post('energo/store','EnergoController@store');
	Route::post('energo/edit', 'EnergoController@edit');
	Route::post('energo/energo_selec', 'EnergoController@energo_selec');
	Route::post('energo/calendario_edit_energo', 'EnergoController@calendario_edit_energo');
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

// Ventas Controller
Route::group(['middleware' => 'auth'], function () {

    /* Nuevas Rutas */
    Route::get('ventas','VentasController@index')->name('ventas.index');
    Route::get('ventas/agregar-prospecto','VentasController@agregar_prospecto')->name('ventas.agregar_prospecto');
    Route::post('ventas/guardar-prospecto','VentasController@guardar_prospecto')->name('ventas.guardarProspecto');
    Route::post('ventas/asignar-prospecto-vendedor','VentasController@asignar_prospecto_vendedor')->name('ventas.asignar_prospecto_vendedor');
    Route::post('ventas/agregar-dias-prospecto','VentasController@agregar_dias_prospecto')->name('ventas.agregar_dias_prospecto');
    Route::get('ventas/editar-prospecto/{id}','VentasController@editar_prospecto')->name('ventas.editar_prospecto');
    Route::get('ventas/visualizar-prospecto/{id}','VentasController@visualizar_prospecto')->name('ventas.visualizar_prospecto');
    Route::post('ventas/actualizar-prospecto','VentasController@actualizar_prospecto')->name('ventas.actualizar_prospecto');
    Route::get('ventas/agregar-cliente/{id}','VentasController@agregar_cliente')->name('ventas.agregar_cliente');
    Route::post('ventas/guardar-cliente','VentasController@guardar_cliente')->name('ventas.guardar_cliente');
    Route::post('ventas/guardar-documento','VentasController@guardar_documento')->name('ventas.guardar_documento');
    Route::post('ventas/eliminar-documento','VentasController@eliminar_documento')->name('ventas.eliminar_documento');
    Route::post('ventas/guardar-propuesta', 'VentasController@guardar_propuesta')->name('ventas.guardar_propuesta');
    Route::post('ventas/eliminar-propuesta', 'VentasController@eliminar_propuesta')->name('ventas.eliminar_propuesta');
    Route::get('ventas/editar-cliente/{id}','VentasController@editar_cliente')->name('ventas.editar_cliente');
    Route::post('ventas/guardar-cambios-cliente','VentasController@guardar_cambios_cliente')->name('ventas.guardar_cambios_cliente');
    Route::get('ventas/visualizar-cliente/{id}','VentasController@visualizar_cliente')->name('ventas.visualizar_cliente');
    Route::get('ventas/agregar-vendedor','VentasController@agregar_vendedor')->name('ventas.agregar_vendedor');
    Route::post('ventas/guardar-vendedor-nuevo','VentasController@guardar_vendedor_nuevo')->name('ventas.guardar_vendedor_nuevo');
    Route::post('ventas/actualizar-vendedor','VentasController@actualizar_vendedor')->name('ventas.actualizar_vendedor');

    Route::get('ventas/editar-vendedor/{id}','VentasController@editar_vendedor')->name('ventas.editar_vendedor');

    Route::get('ventas/agregar-documentacion/{id}','VentasController@agregar_documentacion')->name('ventas.agregar_documentacion');

    Route::post('ventas/agregar-comentario-bitacora', 'VentasController@agregar_comentario_bitacora')->name('ventas.agregar_comentario_bitacora');

    Route::post('ventas/agregar-comentario-bitacora-cliente', 'VentasController@agregar_comentario_bitacora_cliente')->name('ventas.agregar_comentario_bitacora_cliente');

    Route::get('ventas/bitacora/{id}','VentasController@bitacora')->name('ventas.bitacora');
    Route::get('ventas/bitacora-cliente/{id}','VentasController@bitacora_cliente')->name('ventas.bitacora_cliente');
    Route::post('ventas/agregar-datos','VentasController@agregar_datos')->name('ventas.agregar_datos');

    Route::post('ventas/eliminar','VentasController@eliminar')->name('ventas.eliminar');

    Route::post('ventas/eliminar-vendedor','VentasController@eliminar_vendedor')->name('ventas.eliminar_vendedor');

});

// Vendedores Controller
Route::group(['middleware' => 'auth'], function () {
    Route::get('clientes','VendedorClienteController@index')->name('clientes.index');
});

Route::get('clientes/download/{name_file}','VendedorClienteController@download_client')->name('clientes.downloadclient');


//Route::get('estaciones', ['as' => 'estaciones.index', 'uses' => 'EstacionController@index']);
//Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	//Route::get('estaciones', ['as' => 'estaciones.index', 'uses' => 'EstacionController@index']);
	//Route::get('estaciones', ['as' => 'estaciones.edit', 'uses' => 'EstacionController@edit']);
	//Route::put('estaciones', ['as' => 'estaciones.update', 'uses' => 'ProfileController@update']);
//});

