<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function notFoundUnless($value){
        if ( ! $value) App::abort(404);
    }

    public function setAuditoria($file, $accion, $data = array()){

    	$ruta='../app/auditorias/'.$file.'.csv';

    	$file = fopen($ruta,'a+');
		$auditoria = array_flatten([
									$accion,
									date('d-m-Y H:i:s'),
									$data
									]);			
		fputcsv($file, $auditoria);
		fclose($file);
    }

}
