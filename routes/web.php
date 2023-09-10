<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Rutas de registro
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Rutas de restablecimiento de contraseña
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect('/home');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });


    ///////////////////////////////
    ///////// account ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////													  
    																	//							
    //listar account                                                   	/
    Route::get('account/account','App\Http\Controllers\accountController@index');
    //agregar account
    Route::get('account/create', function ()    {
		return view('vendor.adminlte.account.create');
	});
	Route::post('account/save','App\Http\Controllers\accountController@save');
	//editar account
	Route::get('account/edit', function ()    {
		return view('vendor.adminlte.account.edit');
	});
	Route::get('account/edit/{id}','App\Http\Controllers\accountController@edit');
	Route::put('account/editar/{id}','App\Http\Controllers\accountController@update');
	//eliminar account
	Route::delete('account/eliminar/{id}','App\Http\Controllers\accountController@destroy');
    //detalle
    Route::get('account/detalle/{id}','App\Http\Controllers\accountController@detalle');


	///////////////////////////////
    ///////// Cattegorias ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////									  
    																	//							
    //listar categories                                                 /
    Route::get('categories/categories','App\Http\Controllers\CategoriesController@index');
    //agregar categories
    Route::get('categories/create', function ()    {
		return view('vendor.adminlte.categories.create');
	});
	Route::post('categories/save','App\Http\Controllers\CategoriesController@save');
	//editar categories
	Route::get('categories/edit', function ()    {
		return view('vendor.adminlte.categories.edit');
	});
	Route::get('categories/edit/{id}','App\Http\Controllers\CategoriesController@edit');
	Route::put('categories/editar/{id}','App\Http\Controllers\CategoriesController@update');
	//eliminar categories
	Route::delete('categories/eliminar/{id}','App\Http\Controllers\CategoriesController@destroy');

    Route::get('categories/categories/attr/{id}','App\Http\Controllers\CategoriesController@view_attr');
    Route::post('categories/categories/attr/{id}','App\Http\Controllers\CategoriesController@save_attr');

    Route::get('categories/attr/{id}','App\Http\Controllers\CategoriesController@get_all');
    Route::get('categories/eliminarattr/{id}','App\Http\Controllers\CategoriesController@destroyattr');
	///////////////////////////////
    ///////// attached ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////										  
    																	//							
    //listar attached                                                 	/
    Route::get('attached/attached','App\Http\Controllers\AttachedController@index');
    //agregar attached
    Route::get('attached/create', function ()    {
		return view('vendor.adminlte.attached.create');
	});
	Route::get('attached/create/{id}','App\Http\Controllers\attachedController@nuevo');
	Route::post('attached/save','App\Http\Controllers\attachedController@save');
	//editar attached
	Route::get('attached/edit', function ()    {
		return view('vendor.adminlte.attached.edit');
	});
	Route::get('attached/edit/{id}','App\Http\Controllers\attachedController@edit');
	Route::put('attached/editar/{id}','App\Http\Controllers\attachedController@update');
	//eliminar attached
	Route::delete('attached/eliminar/{id}','App\Http\Controllers\attachedController@destroy');

	///////////////////////////////
    ///////// summary ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////													  
    																	//							
    //listar attached                                                 	/
    Route::get('summary/summary','App\Http\Controllers\SummaryController@index');
    //agregar attached
    Route::get('summary/create','App\Http\Controllers\SummaryController@crear');
 //    Route::get('summary/create', function ()    {
	// 	return view('vendor.adminlte.summary.create');
	// });
	Route::post('summary/save','App\Http\Controllers\summaryController@save');
	//editar attached
	Route::get('summary/edit', function ()    {
		return view('vendor.adminlte.summary.edit');
	});
	Route::get('summary/edit/{id}','App\Http\Controllers\summaryController@edit');
	Route::put('summary/editar/{id}','App\Http\Controllers\summaryController@update');
	//eliminar attached
	Route::delete('summary/eliminar/{id}','App\Http\Controllers\summaryController@destroy');
    Route::delete('summary/eliminart/{id}','App\Http\Controllers\summaryController@destroyt');

	///////////////////////////////
    /////////Totales ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////												  
    																	//							
    //listar attached                                                 	/
    Route::get('montos/montos','App\Http\Controllers\TotalController@totales');
    //agregar attached

    ///////////////////////////////
    /////////INICIO ////////////
    ////////////////////////////////////////////////////////////////////////
    																	///										  
    																	//							
    Route::get('/home','App\Http\Controllers\HomeController@index');                                             	
    Route::get('/statisjson','App\Http\Controllers\HomeController@grafica');


   	///////////////////////////////
    /////////detalle ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////											  
    																	//
   	//detalle                                                           /
   	Route::get('detalle/detalle/{id}','App\Http\Controllers\detalleController@view');
   	Route::get('/download/{id}' , 'App\Http\Controllers\detalleController@downloadFile');

    ///////////////////////////////
    ///////// users ////////////
    ////////////////////////////////////////////////////////////////////////
                                                                        ////                                          ///            
                                                                        //                          
    //listar users                                                      /
    Route::get('users/users','App\Http\Controllers\UsersController@index');
    Route::get('users/activar/{id}','App\Http\Controllers\UsersController@activar');
    Route::get('users/desactivar/{id}','App\Http\Controllers\UsersController@desactivar');
    Route::delete('users/eliminar/{id}','App\Http\Controllers\UsersController@destroy');
	

    ///////////////////////////////
    ///////// Transferencias ////////////
    /////////////////////////////////////////////////////////////////////////
                                                                        ////                                          
                                                                        ///                          
    //listar transferencia                                            //

    Route::get('transfer/create','App\Http\Controllers\transferController@totales');
    Route::post('transfer/save','App\Http\Controllers\transferController@save');
    Route::get('transfer/consul/{id}','App\Http\Controllers\transferController@consul');
    Route::get('transfer/edit/{id}','App\Http\Controllers\transferController@edit');
    Route::put('transfer/editar/{id}','App\Http\Controllers\transferController@update');
    //bitacora

     Route::get('bitacora/bitacora','App\Http\Controllers\bitacoraController@index');



    Route::get('pdf', 'App\Http\Controllers\pdfController@index');



    Route::get('tours/tours','App\Http\Controllers\toursController@index');
    //agregar categories
    Route::get('tours/create', function ()    {
        return view('vendor.adminlte.tours.create');
    });
    Route::post('tours/save','App\Http\Controllers\toursController@save');
    //editar categories
    Route::get('tours/edit', function ()    {
        return view('vendor.adminlte.tours.edit');
    });
    Route::get('tours/edit/{id}','App\Http\Controllers\toursController@edit');
    Route::put('tours/editar/{id}','App\Http\Controllers\toursController@update');
    // //eliminar categories
    Route::delete('tours/eliminar/{id}','App\Http\Controllers\toursController@destroy');
    Route::get('tours/eliminarattr/{id}','App\Http\Controllers\toursController@destroyattr');
    
   

    Route::get('tours/tours/attr/{id}','App\Http\Controllers\toursController@view_attr');
    Route::post('tours/tours/attr/{id}','App\Http\Controllers\toursController@save_attr');
    Route::get('tours/attr/{id}','App\Http\Controllers\toursController@get_all');
    Route::get('tours/ver/{id}','App\Http\Controllers\toursController@ver');
    Route::get('tours/fecha/{id}','App\Http\Controllers\toursController@fecha');
    Route::get('tours/tours/select','App\Http\Controllers\toursController@select');

    

    
    Route::get('futuro/futuro','App\Http\Controllers\futuroController@index');
    Route::get('pdffuturo', 'App\Http\Controllers\pdfController@indexfuturo');
    Route::get('future/edit/{id}','App\Http\Controllers\futuroController@edit');
    Route::put('future/editar/{id}','App\Http\Controllers\futuroController@update');
    Route::get('future/acept/{id}','App\Http\Controllers\futuroController@acept');

    //roles
    Route::get('permisos/ver/{id}','App\Http\Controllers\PermissionsController@index');
    Route::get('users/update/{id}','App\Http\Controllers\PermissionsController@update');

    //listar balances de  categories
    Route::get('balance/balance','App\Http\Controllers\balanceController@index');
    Route::get('balance/balance/out','App\Http\Controllers\balanceController@indexinit');
    Route::get('balance/balance/add','App\Http\Controllers\balanceController@indexadd');
//    Route::get('categories/create', function ()    {
//        return view('vendor.adminlte.categories.create');
//    });
    

     

});

    Route::get('/wait', function () {
       return view('vendor.adminlte.wait');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');