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

    public function createMasterJurusan()
    {
        echo json_encode($this->pesanan->createMasterJurusan());
    }

    public function createStockBarang()
    {
        echo json_encode($this->pesanan->createStockBarang());
    }

    public function createPesanan()
    {
        echo json_encode($this->pesanan->createPesanan());
    }

    public function createPesananDetail()
    {        
        echo json_encode($this->pesanan->createPesananDetail());
    }

    public function createPurcaseOrder($id)
    {
        echo json_encode($this->pesanan->createPurcaseOrder($id));
    }

    public function createRincianProduk()
    {
        echo json_encode($this->pesanan->createRincianProduk());
    }

    public function createProgress()
    {
        echo json_encode($this->pesanan->createProgress());
    }

    public function konfirmasiPurcaseOrder($id)
    {
        echo json_encode($this->pesanan->konfirmasiPurcaseOrder($id));
    }

    public function konfirmasiRincianProduk()
    {
        echo json_encode($this->pesanan->konfirmasiRincianProduk());
    }

    public function produksi()
    {
        echo json_encode($this->pesanan->produksi());
    }

    public function hapusPesanan()
    {
        echo json_encode($this->pesanan->hapusPesanan());
    }

    public function hapusMasterBarang()
    {
        echo json_encode($this->pesanan->hapusMasterBarang());
    }

    public function hapusMasterJurusan()
    {
        echo json_encode($this->pesanan->hapusMasterJurusan());
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

    public function bayar()
    {
        echo json_encode($this->pesanan->bayar());
    }
}

?>