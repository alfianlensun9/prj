<?php 

class C_actions extends CI_Controller{    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/M_login', 'login');   
        $this->load->model('pesanan/M_pesanan', 'pesanan');   
    }

    public function cekLogin()
    {
        echo json_encode($this->login->cekLogin());
    }

    public function logout()
    {        
        $this->session->unset_userdata(['isLogin','idUser', 'username', 'idRole']);
        redirect('login');
    }

    public function createAkun()
    {
        echo json_encode($this->login->createAkun());
    }

    public function createMasterBarang()
    {
        echo json_encode($this->pesanan->createMasterBarang());
    }

    public function createPesanan()
    {
        echo json_encode($this->pesanan->createPesanan());
    }

    public function createPesananDetail()
    {        
        echo json_encode($this->pesanan->createPesananDetail());
    }

    public function hapusPesanan()
    {
        echo json_encode($this->pesanan->hapusPesanan());
    }

    public function kirimPesanan()
    {        
        echo json_encode($this->pesanan->kirimPesanan());
    }

    public function createRincianPesanan()
    {                
        echo json_encode($this->pesanan->createRincianPesanan());
    }

    public function konfirmasiRincianPesanan()
    {
        echo json_encode($this->pesanan->konfirmasiRincianPesanan());
    }
}

?>