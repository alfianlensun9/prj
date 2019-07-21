<?php 

class C_view extends CI_Controller{
    private $role;
    public function __construct()
    {
        parent::__construct();   
        $this->role = $this->session->userdata('idRole');
        $this->load->model('login/M_login', 'login');   
        $this->load->model('pesanan/M_pesanan', 'pesanan');        
    }

    public function login()
    {
        if ($this->session->userdata('isLogin') == 1){
            redirect('homepage');
        }
        setView('login/V_login', 'Selamat Datang..');
    }    
    

    public function homepage()
    {
        if ($this->session->userdata('isLogin') != 1){
            redirect('login');
        }
        $data['role'] = $this->role;
        render('homepage/V_homepage', 'Halaman Utama', $data);
    }

    public function orderBarang()
    {
        $data['role'] = $this->role;                

        $data['datapesanan'] = $this->pesanan->getPesanan($this->role != 1 ? [1,2,3] : []);        
        if ($this->role == 1){
            $this->load->view('user/buatPesanan', $data);
        }
        else
        if ($this->role == 2 || $this->role == 4){ 
            $this->load->view('admin/pesanan', $data);            
        }
        else
        {
            $this->load->view('keuangan/daftarPesanan', $data);
        }
        
    }

    public function orderBarangDetail($id)
    {
        $data['role'] = $this->role;
        $getData = $this->pesanan->getPesananDetail($id);    
        $data['datapesanan'] = $getData['dataOrder'];
        $data['datapesanandetail'] = $getData['detailOrder'];          
        if ($this->role == 1){
            $this->load->view('user/buatPesananDetail', $data);
        }
        else
        if ($this->role == 2 || $this->role == 4){ 
            $this->load->view('admin/pesananDetail', $data);
        }
        else
        {
            $this->load->view('keuangan/daftarPesananDetail', $data); 
        }
    }

    public function purcaseOrder($id)
    {
        $getData = $this->pesanan->getPesananDetail($id, 1);      
        $getPurcaseOrder =  $this->pesanan->getPurcaseOrder($id);
        if ($getPurcaseOrder != null){
            $data['datapurcaseorder'] = $getPurcaseOrder;
        }
        $data['datapesanan'] = $getData['dataOrder'];
        $data['datapesanandetail'] = $getData['detailOrder'];        
        $data['masterJurusan'] = $this->pesanan->getMasterJurusan();
        // $this->load->view('user/buatPesananDetail', $data); *user
        // $this->load->view('keuangan/daftarPesananDetail', $data); * keu
        $this->load->view('admin/purcaseOrder', $data);
    }

    public function progress($id)
    {
        $data['role'] = $this->role;
        $data['dataprogress'] = $this->pesanan->getProgress($id);        
        $data['id_trx_order_barang_detail'] = $id;
        $this->load->view('jurusan/progress', $data);
    }

    public function rincianProduk($id)
    {
        $data['role'] = $this->role;
        $data['list_barang'] = $this->pesanan->getListMstBarang();       
        $data['dataOrderBarangdetail'] = $this->pesanan->getDataOrderBarangDetail($id);
        if ($this->role == 4){
            $data['dataRincianProduk'] = $this->pesanan->getRincianProdukWithStock($id);            
        } else {
            $data['dataRincianProduk'] = $this->pesanan->getRincianProduk($id);
        }
        $data['id_trx_order_barang_detail'] = $id;
        $this->load->view('admin/rincianProduk', $data);
    }    


    public function masterBarang()
    {
        $data['dataMasterBarang'] = $this->pesanan->getMasterBarang();
        $this->load->view('master/barang', $data);
    }

    public function masterJurusan()
    {
        $data['dataMasterJurusan'] = $this->pesanan->getMasterJurusan();
        $this->load->view('master/jurusan', $data);
    }

    public function otentikasi()
    {
        $data['selectRole'] = $this->login->selectRole();
        $data['dataauth'] = $this->login->getUser();
        $this->load->view('master/otentikasi', $data);
    }

    public function getRincianDetail()
    {
        echo json_encode($this->pesanan->getRincianDetail());
    }

    public function stockBarang()
    {        
        $data['list_barang'] = $this->pesanan->getListMstBarang();        
        $data['dataStock'] = $this->pesanan->getStockBarang();        
        $this->load->view('gudang/stockBarang', $data);
    }
        
    
}

?>