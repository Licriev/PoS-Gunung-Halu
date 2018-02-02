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

    public function get_by_id($tabel,$where,$id)
    {
        return $this->db->from($tabel)
                        ->where($where,$id)
                        ->get()
                        ->row();

    }

    public function innerJoin()
    {
        return  $this->db->select('*')
                         ->from('kategori_barang')
                         ->join('barang', 'barang.kategori_id = kategori_barang.kategori_id')
                         ->get()
                         ->row();
    }

    public function select_not_where($tabel,$id)
    {
        return $this->db->select()
                        ->from($tabel)
                        ->where_not_in('kategori_id',$id)
                        ->get()
                        ->result();
    }
}

?>