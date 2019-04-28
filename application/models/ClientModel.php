<?php
class ClientModel extends CI_Model{
	function listClient(){
		$hasil=$this->db->get('clients');
		return $hasil->result();
	}
	function saveClient(){
		$data = array(
				'nom_client'	=> $this->input->post('nom_client'),
				'prenom_client' 			=> $this->input->post('prenom_client'),
				'email_client' 	=> $this->input->post('email_client'),
				'tel_client' 		=> $this->input->post('tel_client'),
				'addresse_client' 		=> $this->input->post('addresse_client'),
				'autre_info_client' 		=> $this->input->post('autre_info_client'),
			);
		$result=$this->db->insert('clients',$data);
		return $result;
	}
	function updateClient(){
		$Id_client=$this->input->post('Id_client');
		$nom_client= $this->input->post('nom_client');
		$prenom_client= $this->input->post('prenom_client');
		$email_client= $this->input->post('email_client');
		$tel_client= $this->input->post('tel_client');
		$addresse_client= $this->input->post('addresse_client');
		$autre_info_client= $this->input->post('autre_info_client');

		$this->db->set('nom_client', $nom_client);
		$this->db->set('prenom_client', $prenom_client);
		$this->db->set('email_client', $email_client);
		$this->db->set('tel_client', $tel_client);
		$this->db->set('addresse_client', $addresse_client);
		$this->db->set('autre_info_client', $autre_info_client);
		$this->db->where('Id_client', $Id_client);
		$result=$this->db->update('clients');
		return $result;
	}
	function deleteClient(){
		$Id_client=$this->input->post('Id_client');
		$this->db->where('Id_client', $Id_client);
		$result=$this->db->delete('clients');
		return $result;
	}
}
