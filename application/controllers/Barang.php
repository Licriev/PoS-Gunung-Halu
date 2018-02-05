<?php

class Barang extends CI_Controller{

    public function __construct()
    {
		parent::__construct();
		$this->load->model('model_barang');
    }

    public function tabelBarang()
    {
        $data['list'] = $this->model_barang->select('barang');
        $data['listKategori'] = $this->model_barang->select('kategori_barang');        
		$this->layout->set_header("Tabel Barang");
        $this->layout->set_title("Tabel Barang");
        $this->layout->set_breadcrumb('Dashboard',base_url());
        $this->layout->set_breadcrumb('Barang');
        $this->layout->set_breadcrumb('Tabel Barang');
        $this->layout->set_script(base_url('assets')."/js/barang.js");
        $this->layout->set_foot_tag('barang_master/jsfoot_barang');
        $this->layout->set_content('barang_master/view_barang');
        $this->layout->render($data);
    }

    public function formInput()
    {
        $data = array(
            'listKategori' => $this->model_barang->select('kategori_barang')
        );
		$this->layout->set_header("Input Barang");
        $this->layout->set_title("Input Barang");
        $this->layout->set_breadcrumb('Dashboard',base_url());
        $this->layout->set_breadcrumb('Barang');
        $this->layout->set_breadcrumb('Input Barang');
        $this->layout->set_script(base_url('assets')."/js/barang.js");
        $this->layout->set_foot_tag('barang_master/jsfoot_barang');
        $this->layout->set_content('barang_master/view_input');
        $this->layout->render($data);
    }

    public function prosesInsert()
    {
        $this->form_validation->set_rules('kategoriBarang', 'Kategori Barang', 'trim|required');
        $this->form_validation->set_rules('namaBarang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

        if($this->form_validation->run())
        {
            $kategori = $this->input->post('kategoriBarang');
            $nama     = $this->input->post('namaBarang');
            $harga    = $this->input->post('harga');

            $data = array(
                'kategori_id' => $kategori,
                'nama_barang' => $nama,
                'harga'       => $harga
            );
            $this->model_barang->insert('barang',$data);
            echo json_encode(['result' => TRUE]);
        }else{
            $data = array();
            $this->layout->set_header("Input Barang");
            $this->layout->set_title("Input Barang");
            $this->layout->set_breadcrumb('Dashboard',base_url());
            $this->layout->set_breadcrumb('Barang');
            $this->layout->set_breadcrumb('Tabel Barang');
            $this->layout->set_script(base_url('assets')."/js/barang.js");
            $this->layout->set_foot_tag('barang_master/jsfoot_barang');
            $this->layout->set_content('barang_master/view_input');
            $this->layout->render($data);
            
            $error = validation_errors();
            echo json_encode(['error' => $error,'result'=> false]);
        }
    }

    public function ajaxEdit($id)
    {
        $data1 = $this->model_barang->get_by_id('barang','barang_id',$id);
        $data2 = $this->model_barang->get_by_id('kategori_barang','kategori_id',$data1->kategori_id);
        echo json_encode(array($data1,$data2));
    }

    public function listEdit($id)
    {
        $data1 = $this->model_barang->get_by_id('barang','barang_id',$id);        
        $data2 = $this->model_barang->select_not_where('kategori_barang',$data1->kategori_id);
        echo json_encode($data2);        
    }

    public function prosesUpdate($id)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'trim|required');

        if($this->form_validation->run())
        {
            $data = array(
                'kategori_id' => $this->input->post('kategori_id'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga'       => $this->input->post('harga_barang'),
            );
        
             $where = array(
                'barang_id' => $this->input->post('barang_id')
            );

            $this->model_barang->update('barang',$where,$data);

            echo json_encode(['result'=> true]);
        }else{
            $error = validation_errors();
            echo json_encode(['error' => $error,'result'=> false]);            
        }
    }

    public function prosesDelete($id)
    {
        $this->model_barang->delete('barang',$id);
        echo json_encode(['result' => true]);            
    }
}
?>