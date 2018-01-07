<?php 
class Model_barang extends CI_Model{

    public function select($tabel)
    {
        return $this->db->select()
                        ->from($tabel)
                        ->get()
                        ->result();
        
    }

    public function insert($tabel,$data)
    {
        $this->db->insert($tabel,$data);
    }

    public function update($tabel,$where,$data)
    {
        $this->db->where($where);
        $this->db->update($tabel,$data);
    }

    public function delete($tabel,$id)
    {
        $this->db->where('barang_id',$id);
        $this->db->delete($tabel);
    }

    public function get_by_id($tabel,$id)
    {
        return $this->db->from($tabel)
                        ->where('barang_id',$id)
                        ->get()
                        ->row();

    }
}

?>