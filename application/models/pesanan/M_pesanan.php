<?php 

class M_pesanan extends CI_Model{    

    public function getPesanan($status = [])
    {
        if ($status != []){
            $this->db->where_in('id_mst_status_order', $status);                        
        } else {
            $this->db->where('id_user_inputer', $this->session->userdata('idUser'));
        }        
        $this->db->where('a.flag_active', 1);
        $this->db->order_by('tanggal_order', 'desc');
        $this->db->join('trx_purcase_order as b', 'a.id_trx_purcase_order = b.id_trx_purcase_order', 'left');
        return $this->db->get('trx_order_barang as a')->result_array();
    }
    

    public function getPesananDetail($id, $postatus = 0)
    {    
        $this->db->where('flag_active', 1);
        $dataOrder = $this->db->where('id_trx_order_barang', $id)
                                ->get('trx_order_barang')->row_array(0);
        if ($postatus == 1){
            $this->db->join('trx_rincian_harga as b', 'b.id_trx_order_barang_detail = a.id_trx_order_barang_detail');
        }
        $this->db->where('a.flag_active', 1);
        $dataOrderDetail = $this->db->where('id_trx_order_barang', $id)
                                    ->get('trx_order_barang_detail as a')->result_array();
        return [
            'dataOrder' => $dataOrder,
            'detailOrder' => $dataOrderDetail
        ];
    }

    public function getPesananDetailById($id)
    {
        return $this->db->where('id_trx_order_barang_detail', $id)
                           ->get('trx_order_barang_detail')->row_array(0);
    }

    public function getStockBarang()
    {
        return $this->db->select('*')
                            ->from('trx_stock_barang as a')
                            ->join('mst_barang as b', 'a.id_mst_barang = b.id_mst_barang')
                            ->where('a.flag_active', 1)
                            ->where('b.flag_active', 1)
                            ->get()->result_array();
    }

    public function getRincianDetail()
    {
        return $this->db->where('id_trx_order_barang_detail', $this->input->post('id'))
                        ->where('flag_active', 1)
                        ->order_by('id_trx_rincian_harga', 'desc')
                        ->get('trx_rincian_harga')->row_array(0);
    }

    public function getDataOrderBarangDetail($id)
    {
        return $this->db->where('id_trx_order_barang_detail', $id)                        
                        ->get('trx_order_barang_detail')->row_array(0);
    }

    public function getRincianProduk($id)
    {
        return $this->db->select('*, a.qty_barang as qty_rincian')
                            ->from('trx_rincian_produk as a')
                            ->join('mst_barang as b', 'a.id_mst_barang = b.id_mst_barang')                                                        
                            ->where('a.flag_active', 1)
                            ->where('b.flag_active', 1)                            
                            ->where('a.id_trx_order_barang_detail', $id)
                            ->get()->result_array();
    }

    public function getRincianProdukWithStock($id)
    {
        return $this->db->select('*, a.qty_barang as qty_rincian, c.qty_barang as jlh_stock')
                            ->from('trx_rincian_produk as a')
                            ->join('mst_barang as b', 'a.id_mst_barang = b.id_mst_barang')                                                        
                            ->join('trx_stock_barang as c', 'b.id_mst_barang = c.id_mst_barang','left')                                                        
                            ->where('a.flag_active', 1)
                            ->where('b.flag_active', 1)                                                        
                            ->where('a.id_trx_order_barang_detail', $id)
                            ->group_by('a.id_trx_rincian_produk')
                            ->get()->result_array();
    }

    public function getPurcaseOrder($id)
    {
        return $this->db->select('*')
                        ->from('trx_order_barang as a')
                        ->join('trx_purcase_order as b', 'a.id_trx_purcase_order = b.id_trx_purcase_order')
                        ->join('mst_jurusan as c' , 'b.id_tujuan_order = c.id_mst_jurusan')
                        ->where('id_trx_order_barang', $id)                        
                        ->where('b.flag_active', 1)                        
                        ->get('trx_rincian_harga')->row_array(0);
    }

    public function getMasterBarang()
    {
        return $this->db->where('flag_active', 1)
                        ->get('mst_barang')->result_array();
    }

    public function hapusMasterBarang()
    {
        return $this->db->where('id_mst_barang', $this->input->post('id'))
                        ->update('mst_barang',['flag_active' => 0]);
    }

    public function hapusMasterjurusan()
    {
        return $this->db->where('id_mst_jurusan', $this->input->post('id'))
                        ->update('mst_jurusan',['flag_active' => 0]);
    }

    public function getMasterJurusan()
    {
        return $this->db->where('flag_active', 1)
                        ->get('mst_jurusan')->result_array();
    }

    public function getListMstBarang()
    {
        return $this->db->where('flag_active', 1)
                        ->get('mst_barang')->result_array();
    }

    public function createMasterBarang()
    {        
        $this->db->insert('mst_barang', $this->input->post());         
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->where('flag_active', 1)->get('mst_barang')->result_array()
        ];
    }

    public function createMasterJurusan()
    {        
        $this->db->insert('mst_jurusan', $this->input->post());         
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->where('flag_active', 1)->get('mst_jurusan')->result_array()
        ];
    }
    
    public function createStockBarang()
    {
        $cekBarang = $this->db->where('id_mst_barang', $this->input->post('id_mst_barang'))
                                ->get('trx_stock_barang')->row_array(0);

        if ($cekBarang != null) {
            $this->db->where('id_mst_barang', $this->input->post('id_mst_barang'))
                        ->update('trx_stock_barang',[
                            'qty_barang' => $cekBarang['qty_barang'] + $this->input->post('qty_barang')
                        ]);
        } else {
            $this->db->insert('trx_stock_barang', $this->input->post());         
        }
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ]            
        ];
    }

    public function createPesanan()
    {        
        $this->db->insert('trx_order_barang', $this->input->post());        
        $this->db->order_by('tanggal_order', 'desc');
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->get('trx_order_barang')->result_array()
        ];
    }

    public function createPesananDetail()
    {        
        $this->db->insert('trx_order_barang_detail', $this->input->post());                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->where('id_trx_order_barang', $this->input->post('id_trx_order_barang'))
                                ->where('flag_active', 1)
                                ->get('trx_order_barang_detail')->result_array()
        ];
    }

    public function createPurcaseOrder($id)
    {
        $this->db->insert('trx_purcase_order', $this->input->post());                
        $this->db->where('id_trx_order_barang', $id);
        $this->db->update('trx_order_barang', [
            'id_trx_purcase_order' => $this->db->insert_id(),
            'id_mst_status_order' => 3
        ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->where('id_trx_order_barang', $this->input->post('id_trx_order_barang'))
                                ->where('flag_active', 1)
                                ->get('trx_order_barang_detail')->result_array()
        ];
    }

    public function createRincianProduk()
    {
        $cekRincian = $this->db->where('id_mst_barang', $this->input->post('id_mst_barang'))        
                                ->where('id_trx_order_barang_detail', $this->input->post('id_trx_order_barang_detail'))
                                ->get('trx_rincian_produk')->row_array(0);

        if ($cekRincian != null){
            $this->db->where('id_mst_barang', $this->input->post('id_mst_barang'))        
                        ->where('id_trx_order_barang_detail', $this->input->post('id_trx_order_barang_detail'))
                        ->update('trx_rincian_produk',[
                            'qty_barang' => $cekRincian['qty_barang'] + $this->input->post('qty_barang')
                        ]);
        } else {
            $this->db->insert('trx_rincian_produk', $this->input->post());                
        }
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function createProgress()
    {        
        
        $this->db->insert('trx_progress_produksi', $this->input->post());
                    
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function konfirmasiRincianProduk()
    {
        $this->db->where('id_trx_order_barang_detail', $this->input->post('id'))
                    ->update('trx_order_barang_detail', [
                        'flag_rincian_produk' => 1
                    ]);    
                    
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function konfirmasiPurcaseOrder($id)
    {
        $this->db->where('id_trx_purcase_order', $id);
        $this->db->update('trx_purcase_order', [
                'flag_status_purcase_order' => $this->input->post('ev')
            ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function bayar()
    {
        $this->db->where('id_trx_order_barang_detail', $this->input->post('id'));
        $this->db->update('trx_order_barang_detail', [
                'flag_bayar' => 1
            ]);
            
        $this->db->insert('trx_pembayaran', [
            'id_trx_order_barang_detail' => $this->input->post('id'),
            'jumlah_bayar' => $this->input->post('jumlah_bayar')
        ]);
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function produksi()
    {
        $getProduksi = $this->db->where('id_trx_order_barang_detail', $this->input->post('id'))
                                ->get('trx_rincian_produk')->result_array();
        
        foreach ($getProduksi as $data){
            $dataBarang = $this->db->where('id_mst_barang', $data['id_mst_barang'])
                                    ->get('trx_stock_barang')->row_array(0);
            $this->db->where('id_mst_barang', $data['id_mst_barang'])
                        ->where('flag_active', 1)
                        ->update('trx_stock_barang', [
                            'qty_barang' => $dataBarang['qty_barang'] - $data['qty_barang']
                        ]);
        }

        $this->db->where('id_trx_order_barang_detail', $this->input->post('id'));
        $this->db->update('trx_order_barang_detail', [
                'flag_produksi' => 1
            ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function getProgress($id)
    {
        return $this->db->where('id_trx_order_barang_detail', $id)
                        ->get('trx_progress_produksi')->result_array();
    }

    public function hapusPesanan()
    {
        $this->db->where('id_trx_order_barang_detail', $this->input->post('id'));
        $this->db->update('trx_order_barang_detail', [
                'flag_active' => 0
            ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function kirimPesanan()
    {        
        $this->db->where('id_trx_order_barang', $this->input->post('id'));
        $this->db->update('trx_order_barang', [
                'id_mst_status_order' => 1
            ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function createRincianPesanan()
    {        
        $this->db->where('id_trx_order_barang_detail',$this->input->post('id_trx_order_barang_detail'))
                    ->update('trx_order_barang_detail', [
                        'flag_create_rincian' => 1
                    ]);             
        $this->db->insert('trx_rincian_harga', $this->input->post());
        
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function konfirmasiRincianPesanan()
    {        
        $this->db->where('id_trx_order_barang', $this->input->post('id'));
        $this->db->update('trx_order_barang', [
                'id_mst_status_order' => 2
            ]);                
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }

    public function progressSelesai()
    {
        $this->db->where('id_trx_order_barang_detail', $this->input->post('id'))
                    ->update('trx_order_barang_detail', [
                        'flag_produksi' => 2
                    ]);

        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => null
        ];
    }
    

    
}

?>