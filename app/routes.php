<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('email', function(){	
	return View::make('emails/confirmationEmail');
});


//Views static
Route::get('/',['as'=>'inicio', 'uses'=>'ShowController@showInicio']);
Route::get('talleres',['as'=>'talleres', 'uses'=>'ShowController@showTalleres']);
Route::get('eventos',['as'=>'eventos', 'uses'=>'ShowController@showEventos']);
Route::get('taller/{slug}/{id}',['as'=>"taller", 'uses'=>'ShowController@showTaller']);
Route::get('evento/{slug}/{id}',['as'=>"evento", 'uses'=>'ShowController@showEvento']);
Route::get('passwordReset',['as'=> 'passwordReset', 'uses' => 'ShowController@showpasswordReset']);
Route::post('passwordemail',['as'=> 'passwordemail', 'uses' => 'UpdateController@updatePassword']);
Route::get('password/{email}/{token}',['as'=> 'password', 'uses' => 'ShowController@shownewpassword']);
Route::post('newPassword',['as'=> 'newPassword', 'uses' => 'UpdateController@updateNewPassword']);

Route::group(['before'=>'guest'], function(){

	Route::get('confirmation/{email}/{token}',['as'=>"confirmation", 'uses'=>'AuthController@confirmation']);
	//Views Authenticate
	Route::post('iniciosesion',['as'=>'login', 'uses'=>'AuthController@login']);
	Route::get('iniciosesion',['as'=>'iniciosesion', 'uses'=>'ShowController@showInicioSesion']);

	//View registro
	Route::get('registro',['as'=>'registro', 'uses'=>'ShowController@showRegistro']);
	Route::post('registro',['as'=>'register', 'uses'=>'CreateController@createRegistro']);	
});

Route::group(['before'=>'auth'], function(){

	Route::group(['before'=>'is_admin'], function(){
		// lista de talleres
		Route::get('listaTalleres',['as'=>'listatalleres', 'uses'=>'UtilsController@showListaTalleres']);
		//Views Users
		Route::get('adminusuarios',['as'=>'adminusuarios', 'uses'=>'ShowController@showAdminUsuarios']);
		Route::get('search',['as'=>'searchUsuarios', 'uses'=>'SearchController@searchUsuariosTipo']);

		// Create taller
		Route::get('admintalleres',['as'=>'admintalleres', 'uses'=>'ShowController@showAdminTalleres']);
		Route::post('admintalleres',['as'=>'admintalleres', 'uses'=>'CreateController@createTalleres']);

		//Update taller
		// Delete taller
		Route::put('availableTalleres',['as'=>'availableTalleres', 'uses'=>'UpdateController@updateAvailableTalleres']);
		
		Route::get('admintaller/{slug}/{id}',['as'=>'admintaller', 'uses'=>'ShowController@showAdminTaller']);
		Route::get('deletetaller',['as'=>'deletetaller', 'uses'=>'DeleteController@deleteAdminTaller']);
		Route::put('updateAdmintaller',['as'=>'updateAdmintaller', 'uses'=>'UpdateController@updateAdmintaller']);

		//Update usuario
		//Delete usuario
		Route::get('adminusuario/{id}',['as'=>'showUsuario', 'uses'=>'ShowController@showUpdateUsuario']);
		Route::get('adminusuario',['as'=>'deleteUsuario', 'uses'=>'DeleteController@deleteUsuario']);
		Route::put('adminusuario',['as'=>'updateUsuario', 'uses'=>'UpdateController@updateUsuario']);

		//Validar asistente
		Route::get('validarasistente',['as'=>'validarasistente', 'uses'=>'ShowController@showValidarAsistente']);
		Route::put('validarasistente',['as'=>'updatevalidarasistente', 'uses'=>'UpdateController@updateValidarPago']);
	});

	Route::group(['before'=>'is_reporteador'], function(){
		Route::get('estadisticas',['as'=>'estadisticas', 'uses'=>'ShowController@showEstadisticas']);
		Route::get('searchusuarios',['as'=>'searchusuarios', 'uses'=>'SearchController@searchUsuarios']);
		Route::get('sendemail',['as'=>'sendemail', 'uses'=>'UtilsController@sendEmailMass']);
	});

	Route::group(['before'=>'is_vendedor'], function(){		
		Route::get('notifications',['as'=>'notifications', 'uses'=>'ShowController@showNotifications']);
		Route::put('notifications',['as'=>'verificarAsistente', 'uses'=>'UpdateController@verificarAsistente']);

		Route::get('validarasistentevend',['as'=>'validarasistentevend', 'uses'=>'ShowController@showValidarAsistenteVend']);
		Route::put('validarasistentevend',['as'=>'updatevalidarasistentevend', 'uses'=>'UpdateController@updateValidarPagoVend']);
		
		// Route::get('imprimirreconocimientovend/{id}',['as'=>'imprimirreconocimientovend', 'uses'=>'ImprimirController@imprimirReconocimiento']);
		Route::get('visualizarfichas/{id}',['as'=>'showfichas', 'uses'=>'ShowController@showFichas']);
		Route::get('sendemailuser/{id}',['as'=>'showsendEmailUser', 'uses'=>'ShowController@showSendEmailUser']);
		Route::post('sendemailuser',['as'=>'sendEmailUser', 'uses'=>'UtilsController@sendEmailUser']);
	});

	Route::group(['before'=>'is_asistenteORvendedor'], function(){
		Route::get('imprimirpasevend/{id}',['as'=>'imprimirpasevend', 'uses'=>'ImprimirController@imprimirPase']);
		Route::get('pase/{id}',['as'=>'pase', 'uses'=>'ImprimirController@imprimirPaseAprobado']);
		Route::get('imprimirpase/{id}',['as'=>'imprimirpase', 'uses'=>'ImprimirController@imprimirPase']);
	});

	Route::group(['before'=>'is_adminORvendedor'], function(){
		Route::get('analytics',['as'=>'Analytics', 'uses'=>'UtilsController@showAnalytics']);
	});

	Route::group(['before'=>'is_asistente'], function(){
		
		// Route::get('imprimirreconocimiento',['as'=>'imprimirreconocimiento', 'uses'=>'ImprimirController@imprimirReconocimiento']);
		// Route::get('comprarpase',['as'=>'comprarpase', 'uses'=>'UtilsController@show']);
		Route::get('inscribirtaller',['as'=>'inscribirtaller', 'uses'=>'UtilsController@inscribirtaller']);
	});
	

	//Logout => Cerrar sesion
	Route::get('cerrarsesion',['as'=>'logout', 'uses'=>'AuthController@logout']);

	// Update Account
	Route::get('perfil',['as'=>'perfil', 'uses'=>'ShowController@showPerfil']);
	Route::put('perfilittg',['as'=>'updatePerfilIttg', 'uses'=>'UpdateController@updatePerfilIttg']);
	Route::put('perfilunach',['as'=>'updatePerfilUnach', 'uses'=>'UpdateController@updatePerfilUnach']);
	Route::put('perfilforaneo',['as'=>'updatePerfilForaneo', 'uses'=>'UpdateController@updatePerfilForaneo']);
	Route::put('perfilstaff',['as'=>'updatePerfilStaff', 'uses'=>'UpdateController@updatePerfilStaff']);

});

App::missing(function($exception){
	return Response::view('error.error404');
});

// Route::get('candidates/{slug}/{id}',['as'=>'category','uses'=>'CandidatesController@category']);