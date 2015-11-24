<?php

class RestModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data)
    {
        $this->db->insert('userTable',$data);
        if($this->db->affected_rows())
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function retrieve()
    {
        $this->db->select('*');
        $this->db->from('userTable');
        $query=$this->db->get();
        if($query->num_rows()>=1)
        {
            return $query->result();
        }
        else {
            return false;
        }
    }
    public function update($id,$name)
    {
        try
        {
            $this->db->where('id',$id);
            $data=array('name'=>$name);
            $this->db->update('userTable',$data);
            if($this->db->affected_rows())
            {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    public function delete($id)
    {   
        try {
            $this->db->where('id',$id);
            $this->db->delete('userTable');
            if($this->db->affected_rows())
            {
                return TRUE;
            }
            else {
                return FALSE;
            }
        } 
        catch (Exception $ex) {
            return FALSE;
        }
        
    }
}