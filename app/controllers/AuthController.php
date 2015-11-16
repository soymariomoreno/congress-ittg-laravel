<?php


use Micai\Repositorios\UsuariosRepo;
use Micai\Manejadores\WithoutRulesManejador;

class AuthController extends BaseController {

	protected $usuariosRepo;

	function __construct(UsuariosRepo $usuariosRepo){		
		$this->usuariosRepo = $usuariosRepo;
	}

	public function login(){
		$data = Input::only('email', 'password', 'remember');

		$credeciales = ['email'=>$data['email'], 'password'=>$data['password']];

		if(Auth::attempt($credeciales, $data['remember'])){		

			$data = [	Auth::user()->full_name,								
								Auth::user()->email,
								Auth::user()->tipo			
							];	

			if(Auth::user()->tipo == 'asistente')
				if(Auth::user()->available_email === 1 && Auth::user()->available_vendedor === 1){					
					$this->setAuditoria('acceso','login',$data);
					Session::put('id', Auth::user()->id);
				}else{
					if(Auth::user()->available_email === 1)
						Session::flash('aviso', 'Debe tener la autorización de su vendedor.');
					else
						Session::flash('aviso', 'Debe confirmar su correo.');					
					Auth::logout();
					return Redirect::back();
				}
			if(Auth::user()->tipo == 'administrador' || Auth::user()->tipo == 'vendedor')
					$this->setAuditoria('acceso','login',$data);

			return Redirect::route('inicio');

		}
		
		return Redirect::back()->with('login_error', 1)->withInput();
	}

	public function logout(){

		$data = [	Auth::user()->full_name,					
					Auth::user()->email,
					Auth::user()->tipo			
				];

		Auth::logout();
		$this->setAuditoria('acceso','logout', $data);
		return Redirect::route('inicio');
	}

	public function confirmation($email, $token){

		if($this->usuariosRepo->confirmationToken($email, $token)){	

			$data = ['available_email' => 1];			
			$user = $this->usuariosRepo->saveconfirmationToken($email, $token);
			$manager = new WithoutRulesManejador($user, $data);

			if($manager->save()){				
				return Redirect::route('login');		
			}
			else{
				Session::flash('aviso', 'Ocurrió un problema al validar su correo.Intente de nuevo');
				return Redirect::route('inicio');		
			}
		}
	}

}
