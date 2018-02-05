<?php
class Kategori extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kategori');
    }

    public function tabelKategori()
    {     
        $data = array(
            'list_kategori' => $this->model_kategori->select('kategori_barang'),
        );
		$this->layout->set_header("Tabel Kategori");
        $this->layout->set_title("Tabel Kategori");
        $this->layout->set_breadcrumb('Dashboard',base_url());
        $this->layout->set_breadcrumb('Kategori');
        $this->layout->set_breadcrumb('Tabel Kategori');
        $this->layout->set_script(base_url('assets')."/js/kategori.js");
        $this->layout->set_foot_tag('kategori_master/jsfoot_kategori');
        $this->layout->set_content('kategori_master/view_kategori');
        $this->layout->render($data);
    }

    public function formInput()
    {   
        $data = array();
		$this->layout->set_header("Form Kategori");
        $this->layout->set_title("Form Kategori");
        $this->layout->set_breadcrumb('Dashboard',base_url());
        $this->layout->set_breadcrumb('Kategori');
        $this->layout->set_breadcrumb('Input Kategori');
        $this->layout->set_script(base_url('assets')."/js/kategori.js");
        $this->layout->set_foot_tag('kategori_master/jsfoot_kategori');
        $this->layout->set_content('kategori_master/view_input');
        $this->layout->render($data);
    }

    public function prosesInsert()
    {
        $this->form_validation->set_rules('namaKategori','Nama Kategori','trim|required');

        if($this->form_validation->run())
        {
            $namaKategori = $this->input->post('namaKategori');
            $data = array(
                'nama_kategori' => $namaKategori
            );
            $this->model_kategori->insert('kategori_barang',$data);
            echo json_encode(['result' => true]);
        }else{
            $data = array();
            $this->layout->set_header("Input Kategori");
            $this->layout->set_title("Input Kategori");
            $this->layout->set_breadcrumb('Dashboard',base_url());
            $this->layout->set_breadcrumb('Kategori');
            $this->layout->set_breadcrumb('Tabel Kategori');
            $this->layout->set_script(base_url('assets')."/js/kategori.js");
            $this->layout->set_foot_tag('kategori_master/jsfoot_kategori');
            $this->layout->set_content('kategori_master/view_input');
            $this->layout->render($data);
            
            $error = validation_errors();
            echo json_encode(['error' => $error,'result'=> false]);
        }
    }

    public function ajaxEdit($id)
    {
        $data = $this->model_kategori->get_by_id('kategori_barang','kategori_id',$id);
        echo json_encode($data);
    }

    public function prosesUpdate($id)
    {
        $this->form_validation->set_rules('nama_kategori','Nama Kategori','trim|required');

        if($this->form_validation->run())
        {
            $where = array('kategori_id' => $id);
            $data = array('nama_kategori' => $this->input->post('nama_kategori'));

            $this->model_kategori->update('kategori_barang',$where,$data);
            echo json_encode(['result' => true]);
        }else{
            $error = validation_errors();
            echo json_encode(['error' => $error,'result'=> false]);
        }
    }

    public function prosesDelete($id)
    {
        $this->model_kategori->delete('kategori_barang',$id);
        echo json_encode(['result' => true]);
    }
}
?>