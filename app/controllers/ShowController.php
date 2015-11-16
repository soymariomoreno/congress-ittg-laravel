<?php

use Micai\Entidades\Usuarios;
use Micai\Repositorios\UsuariosRepo;
use Micai\Repositorios\CategoriasRepo;
use Micai\Repositorios\ContenidosRepo;
use Micai\Manejadores\RegistroManejador;
use Micai\Manejadores\ContenidoManejador;
use Micai\Manejadores\AsistentePagoManejador;
use Micai\Manejadores\AccountManejador;
use Micai\Manejadores\UpdateContenidoManejador;
use Micai\Manejadores\UpdateAccountManejador;

class ShowController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo;
	protected $contenido_editable;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
	}

	
	public function showInicioSesion(){
		return View::make('users/iniciosesion');
	}

	public function showSendEmailUser($id){
		Session::put('iduseremail', $id);
		return View::make('users/sendEmail');
	}

	function showTalleres(){
		if(Auth::check())
			if(Auth::user()->tipo == 'vendedor'){
				$noti = $this->usuariosRepo->noti(Auth::user()->id);				
				Session::flash('noti', $noti);							
			}

		$categorias = $this->categoriasRepo->buscartodo();
		return View::make('static/talleres', compact('categorias', 'noti'));
	}
	function showEventos(){		
		$categorias = $this->categoriasRepo->buscartodo();
		return View::make('static/eventos', compact('categorias'));
	}

	function showTaller($slug, $id){
		if(Auth::check())
			if(Auth::user()->tipo == 'vendedor'){
				$noti = $this->usuariosRepo->noti(Auth::user()->id);				
				Session::flash('noti', $noti);							
			}

		$taller = $this->contenidosRepo->buscar($id);
		$this->notFoundUnless($taller);

		Session::put('taller', $id);		

		return View::make('static/taller', compact('taller', 'noti'));
	}
	function showEvento($slug, $id){
		$taller = $this->contenidosRepo->buscar($id);
		$this->notFoundUnless($taller);
		return View::make('static/evento', compact('taller', 'noti'));
	}

	function showInicio(){
		if(Session::get('var'))
			Session::forget('var');

		if(Auth::check())
			if(Auth::user()->tipo == 'vendedor'){
				$noti = $this->usuariosRepo->noti(Auth::user()->id);				
				Session::flash('noti', $noti);							
			}
		return View::make('static/inicio', compact('noti'));
	}

	public function showAdminUsuarios(){
		$usuarios = $this->usuariosRepo->buscartodo();
		return View::make('users/adminusuarios', compact('usuarios'));
	}

	public function showPerfil(){
		$user = Auth::user();

		if(Auth::check())
			if(Auth::user()->tipo == 'vendedor'){
				$noti = $this->usuariosRepo->noti(Auth::user()->id);				
				Session::flash('noti', $noti);							
			}

		if($user->tipo == 'asistente'){
			$type_user = $user->tipo_procedencia;		
			if(Auth::user()->available_pase == 1){
				Session::flash('aviso', 'Ya no puede volver a modificar su perfil');
				return Redirect::route('inicio');
			}

			$ListaVendedores = [''=>'Seleccionar un vendedor'] + $this->usuariosRepo->vendedoresList();
			// 3 -> Vendedor de la Foraneos/Nacionales/Extranjeros
			// 4 -> Vendedor de la UNACH
			array_forget($ListaVendedores, '3');
			array_forget($ListaVendedores, '4');

			switch ($type_user) {
				case 'ittg':
					return View::make('users/perfilittg', compact('user', 'ListaVendedores'));
					break;
				case 'unach':
					return View::make('users/perfilunach', compact('user'));
					break;
				default:
					return View::make('users/perfilforaneo', compact('user'));
					break;
			}
		}
		return View::make('users/perfilstaff', compact('user', 'noti'));

	}

	public function showRegistro(){
		$ListaVendedores = [''=>'Seleccionar un vendedor'] + $this->usuariosRepo->vendedoresList();
		// 3 -> Vendedor de la Foraneos/Nacionales/Extranjeros
		// 4 -> Vendedor de la UNACH
		array_forget($ListaVendedores, '3');
		array_forget($ListaVendedores, '4');
		return View::make('users/registro', compact('ListaVendedores'));
	}

	public function showFichas($id){
		$user = $this->usuariosRepo->buscar($id);
		$this->notFoundUnless($user);

		return View::make('users/fichas', compact('user'));
		
	}

	public function showAdminTalleres(){
		$categorias = $this->categoriasRepo->buscarTodo();		
		$taller = $this->categoriasRepo->buscar('1');		
		$categoriasLista = [''=>'Selecciona una categoria'] + $this->categoriasRepo->categoriasList();		
		$contenidosRecientes = $this->contenidosRepo->buscarRecientes();
		return View::make('users/admintalleres', compact('categorias','contenidosRecientes','categoriasLista', 'taller'));
	}

	public function showAdminTaller($slug, $id){		
		$taller = $this->contenidosRepo->buscar($id);

		$this->notFoundUnless($taller);

		$taller['contenido'] = explode("<br />", $taller['contenido']);
		$taller['contenido'] = implode($taller['contenido']);	

		Session::put('id_contenido',$id);

		$categoriasLista = [''=>'Selecciona una categoria'] + $this->categoriasRepo->categoriasList();

		return View::make('users/admintaller', compact('taller', 'categoriasLista'));
	}

	public function showUpdateUsuario($id){

		$user = $this->usuariosRepo->buscar($id);
		$this->notFoundUnless($user);

		Session::put('id_usuario', $id);

		return View::make('users/updateUsuario', compact('user'));
	}

	public function showValidarAsistente(){
		$usuarios = $this->usuariosRepo->buscarAsistentePaginado();
		$talleresLista = ['1'=>'Sin taller'] + $this->contenidosRepo->contenidosList();
		return View::make('users/validarasistente', compact('usuarios', 'talleresLista'));
	}

	public function showValidarAsistenteVend(){
		if(Auth::check())
			if(Auth::user()->tipo == 'vendedor'){
				$noti = $this->usuariosRepo->noti(Auth::user()->id);				
				Session::flash('noti', $noti);							
			}

		$usuarios = $this->usuariosRepo->buscarAsistentePorVendedorPaginado(Auth::user()->id);
		$talleresLista = ['1'=>'Sin taller'] + $this->contenidosRepo->contenidosList();
		return View::make('users/validarasistentevend', compact('usuarios', 'talleresLista', 'noti'));
	}

	public function showEstadisticas(){

		$usersRegistrados = $this->usuariosRepo->countRegistrados();
		$usersPagados = $this->usuariosRepo->countPagados();
		$usersImpresos = $this->usuariosRepo->countImpresos();
		$talleresLista = ['1'=>'Sin taller'] + $this->contenidosRepo->contenidosList();

		return View::make('users/estadisticas', compact('usersRegistrados', 'usersPagados', 'usersImpresos', 'talleresLista'));
	}

	public function showNotifications(){
		$usuarios = $this->usuariosRepo->notiUser(Auth::user()->id);		
		return View::make('users/notificationsVendedor', compact('usuarios'));
	}

	public function showpasswordReset(){
		return View::make('users/passwordReset');
	}

	public function shownewpassword($email,$token){		 		
		return View::make('users/nuevopassword',compact('email','token'));
	}

}