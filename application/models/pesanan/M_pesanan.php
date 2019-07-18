<?php 

class M_pesanan extends CI_Model{    

    public function getPesanan($status = [])
    {
        if ($status != []){
            $this->db->where_in('id_mst_status_order', $status);
        }
        $this->db->where('flag_active', 1);
        $this->db->order_by('tanggal_order', 'desc');
        return $this->db->get('trx_order_barang')->result_array();
    }

    public function getPesananDetail($id, $postatus = 0)
    {    

        $this->db->where('flag_active', 1);
        $dataOrder = $this->db->where('id_trx_order_barang', $id)
                                ->get('trx_order_barang')->row_array(0);
        if ($postatus == 1){
            $this->db->join('trx_rincian_harga', 'trx_rincian_harga.id_trx_order_barang_detail = trx_order_barang_detail.id_trx_order_barang_detail');
        }
        $this->db->where('flag_active', 1);
        $dataOrderDetail = $this->db->where('id_trx_order_barang', $id)
                                    ->get('trx_order_barang_detail')->result_array();
        return [
            'dataOrder' => $dataOrder,
            'detailOrder' => $dataOrderDetail
        ];
    }

    public function getRincianDetail()
    {
        return $this->db->where('id_trx_order_barang_detail', $this->input->post('id'))
                        ->where('flag_active', 1)
                        ->order_by('id_trx_rincian_harga', 'desc')
                        ->get('trx_rincian_harga')->row_array(0);
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
    

    
}

?>