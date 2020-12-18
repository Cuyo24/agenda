<?php namespace App\Models;

/**
  * 
  */
use CodeIgniter\Model;


 class agendas extends Model
 {
 	
 	public function listarNombresA(){
 		$Nombres = $this->db->query("SELECT t_agenda.id_agenda, t_categoria.descripcion AS Categorias, t_agenda.nombre, t_agenda.Apaterno, t_agenda.Amaterno, t_agenda.telefono, t_agenda.email, t_agenda.id_categoria,t_agenda.fechaInsert FROM t_agenda, t_categoria where t_categoria.id_categoria=t_agenda.id_categoria");

 		return $Nombres->getResult();

 	}

 	public function insertarA($datos){
 		$Nombres = $this->db->table('t_agenda');
 		$Nombres->insert($datos);

 		return $this->db->insertID();
 
 	}


 	public function obtenerNombreA($data){
 		$Nombres = $this->db->table('t_agenda');
 		$Nombres->where($data);

 		return $Nombres->get()->getResultArray();

 	}


 	public function ActualizarA($data,$idNombre){
 		$Nombres=$this->db->table('t_agenda');
 		$Nombres->set($data);
 		$Nombres->where('id_agenda',$idNombre);
 		return $Nombres->update();



 	}


 	public function EliminarA($data){

 		$Nombres = $this->db->table('t_agenda');
 		$Nombres->where($data);
 		return $Nombres->delete();

 	}
 } 
