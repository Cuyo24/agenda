<?php namespace App\Models;

/**
  * 
  */
use CodeIgniter\Model;

 class categoria extends Model
 {
 	
 	public function listarNombres(){
 		$Nombres = $this->db->query("SELECT * From t_categoria");

 		return $Nombres->getResult();

 	}

 	public function insertar($datos){
 		$Nombres = $this->db->table('t_categoria');
 		$Nombres->insert($datos);

 		return $this->db->insertID();
 
 	}


 	public function obtenerNombre($data){
 		$Nombres = $this->db->table('t_categoria');
 		$Nombres->where($data);

 		return $Nombres->get()->getResultArray();

 	}


 	public function Actualizar($data,$idNombre){
 		$Nombres=$this->db->table('t_categoria');
 		$Nombres->set($data);
 		$Nombres->where('id_categoria',$idNombre);
 		return $Nombres->update();



 	}


 	public function Eliminar($data){

 		$Nombres = $this->db->table('t_categoria');
 		$Nombres->where($data);
 		return $Nombres->delete();

 	}
 } 
