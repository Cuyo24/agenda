<?php namespace App\Controllers;

use App\Models\categoria;
use App\Models\agendas;

class Agenda extends BaseController
{
		public function index()
		{
		return view('inicio');	
		}


		public function categoria()
		{$categoria = new categoria();

		$datos=$categoria->listarNombres();

		$mensaje = session('mensaje');

		$data=[
			"datos"=>$datos,
			"mensaje"=>$mensaje
		];

		return view('Lcategoria',$data);
	}

	public function Crear(){

		$datos = [
			"id_categoria" => $_POST['id_categoria'],
			"nombre" => $_POST['nombre'],
			"descripcion" => $_POST['descripcion'],
			"fechaInsert" => $_POST['fechaInsert']
		];

		$categoria = new categoria();
		$respuesta = $categoria->insertar($datos);

		if ($respuesta>0) {
			return redirect()->to(base_url().'/Categorias')->with('mensaje','1');
		}
		else
		{
		return redirect()->to(base_url().'/Categorias')->with('mensaje','0');
		}


	}

	public function Actualizar(){

		$datos = [

			
			"nombre" => $_POST['nombre'],
			"descripcion" => $_POST['descripcion'],
			"fechaInsert" => $_POST['fechaInsert']
		];
		
		$idNombre= $_POST['idNombre'];

		$categoria=new categoria();
		$respuesta=$categoria->Actualizar($datos, $idNombre);

		if ($respuesta) {
			return redirect()->to(base_url().'/Categorias')->with('mensaje','2');
		}
		else
		{
		return redirect()->to(base_url().'/Categorias')->with('mensaje','3');
		}

	}

	public function obtenerNombre($idcategoria){

		$data = ["id_categoria" => $idcategoria];
		$categoria=new categoria();

		$respuesta=$categoria->obtenerNombre($data);

		$datos=["datos"=>$respuesta];


		return view('EditarC',$datos);
		
	}

	public function Eliminar($idcategoria){
		$categoria=new categoria();
		$data = ["id_categoria" => $idcategoria];

		$respuesta = $categoria->Eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Categorias')->with('mensaje','4');
		}
		else
		{
		return redirect()->to(base_url().'/Categorias')->with('mensaje','5');
		}
	}
	//--------------------------------------------------------------------
	public function agendas()
		{$agendas = new agendas();

		$datos=$agendas->listarNombresA();

		$mensaje = session('mensaje');

		$data=[
			"datos"=>$datos,
			"mensaje"=>$mensaje
		];

		return view('Lagenda',$data);
	}

	public function CrearA(){

		$datos = [
			"nombre" => $_POST['nombre'],
			"Apaterno" => $_POST['Apaterno'],
			"Amaterno" => $_POST['Amaterno'], 
			"telefono" => $_POST['telefono'],
			"email" => $_POST['email'],
			"fechaInsert" => $_POST['fechaInsert'],
			"id_categoria" => $_POST['id_categoria']
		];
		$agendas = new agendas();
		$respuesta = $agendas->insertarA($datos);

		if ($respuesta > 0){
			return redirect()->to(base_url().'/Agenda')->with('mensaje','1');
		}else{
			return redirect()->to(base_url().'/Agenda')->with('mensaje','0');
		}


	}


	public function ActualizarA(){
		$datos = [
			"nombre" => $_POST['nombre'],
			"Apaterno" => $_POST['paterno'],
			"Amaterno" => $_POST['materno'],
			"telefono" => $_POST['telefono'],
			"email" => $_POST['email'],
			"id_categoria" => $_POST['id_categoria']
		];
		$idNombre =  $_POST['idNombre'];

		$agendas = new agendas();

		$respuesta = $agendas->ActualizarA($datos, $idNombre);

		if ($respuesta){
			return redirect()->to(base_url().'/Agenda')->with('mensaje','2');
		}else{
			return redirect()->to(base_url().'/Agenda')->with('mensaje','3');
		}
	}

	public function obtenerNombreA($idNombre){
		$data = ["id_agenda" => $idNombre];
		$agendas = new agendas();
		$respuesta = $agendas->obtenerNombreA($data);

		$datos = ["datos"=>$respuesta];

		return view('EditarA', $datos);
	}

	public function EliminarA($idagendas){
		$agendas=new agendas();
		$data = ["id_agenda" => $idagendas];

		$respuesta = $agendas->EliminarA($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Agenda')->with('mensaje','4');
		}
		else
		{
		return redirect()->to(base_url().'/Agenda')->with('mensaje','5');
		}


}
}
