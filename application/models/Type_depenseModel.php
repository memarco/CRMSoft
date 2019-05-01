<?php
class Type_depenseModel extends CI_Model{
	function listType_depense(){
		$hasil=$this->db->get('type_depenses');
		return $hasil->result();
	}
	function saveType_depense(){
		$data = array(
				'libelle_type_depense'	=> $this->input->post('libelle_type_depense')
				 );
		$result=$this->db->insert('type_depenses',$data);
		return $result;
	}
	function updateType_depense(){
		$Id_type_depense=$this->input->post('Id_type_depense');
		$libelle_type_depense= $this->input->post('libelle_type_depense');
		 

		$this->db->set('libelle_type_depense', $libelle_type_depense);
		 
		$this->db->where('Id_type_depense', $Id_type_depense);
		$result=$this->db->update('type_depenses');
		return $result;
	}
	function deleteType_depense(){
		$Id_client=$this->input->post('Id_type_depense');
		$this->db->where('Id_type_depense', $Id_client);
		$result=$this->db->delete('type_depenses');
		return $result;
	}
}
