<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main_model extends CI_Model {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
// login when email and password equal
        function can_login($Email,$Password)
        {
            $this->db->where('email',$Email);
            $this->db->where('password',$Password);
            $Query = $this->db->get('tb_login');
            return $Query;
        }

/** Insert Client Details to the database table 'tb_client_details'*/
        function insert($Data)
        {
            $Query = $this->db->insert('tb_client_details',$Data); 
            return $Query;
        }

/** Fetch Client Details fom the database table 'tb_client_details'*/
        function fetch()
        {
            $Query = $this->db->get('tb_client_details');
            return $Query->result();
        }

/** Search Client Details in the database table 'tb_client_details'*/
        function search($search_data,$select_field)
        {
            $this->db->like($select_field,$search_data);
            $Query = $this->db->get('tb_client_details');
            return $Query->result();

        }

/** Select Client Details from  database where id from the select_client */
        function select_data($checked_id)
        {
            $Query = $this->db->select('*')->from('tb_client_details')->where_in('id',$checked_id)->get();
            return $Query->result();
        }
/** Delete selected Client Details from  database where id from the select_client */
        function delete_selected_details($checked_delete_id)
        {
            $this->db->where_in('id',$checked_delete_id);
            return $this->db->delete('tb_client_details');
        }

/** Delete Client Details from the database where id from the view_tabel */
        function delete($id)
        {
            $Query = $this->db->where('id',$id);
            $this->db->delete('tb_client_details');
        }

/** fetch Client Details from the database table 'tb_client_details' for editing*/
        function get_id($id)
        {
            $Query = $this->db->get_where('tb_client_details',array('id'=>$id));
            return $Query->row_array();
        }

/** Update Client Details from database table 'tb_client_details' after editig*/
        function update($id,$data)
        {
            $Query = $this->db->where('id',$id);
            $this->db->update('tb_client_details',$data);

        }

/** fetch Client Details from the database table 'tb_client_details'*/
        function fetch_date()
        {
            $Query = $this->db->get('tb_client_details');
            return $Query->result();
        }
        
    }

?>