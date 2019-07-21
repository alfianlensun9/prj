<div class="form-row">        
    <div class="col-12">            
        <strong>Buat Pesanan</strong>
    </div>        
    <div class="col-lg-12 mt-3">
        <div class="form-row">
            <div class="col-lg-12"> 
                <form action="#" method="post" id="formPesanan">
                    <div class="form-row">
                        <input type="hidden" name="id_user_inputer" value="<?= $this->session->userdata('idUser') ?>">
                        <div class="col-lg-2 mt-3">
                            <label for="">Tanggal Pesanan</label>
                        </div>
                        <div class="form-group col-lg-4 mt-2">                        
                            <input type="date" class="form-control form-control-sm" name="tanggal_order">
                        </div>    
                        <div class="col-lg-3"> 
                            <button type="button" class="btn btn-primary btn-buat-pesanan btn-sm">
                                Buat <i class="fa fa-plus"></i>
                            </button>       
                        </div>                
                    </div>     
                </form>                          
            </div>         
            <div class="col-lg-12 mt-4">
                <strong>Daftar Pesanan</strong>
            </div>               
            <div class="col-lg-12">                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Pesanan</th>                    
                        <th scope="col">Opsi</th>                    
                        </tr>
                    </thead>
                    <tbody id="tbody-pesanan">
                        <?php 
                            $no = 1;
                            foreach($datapesanan as $dt): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['tanggal_order'] ?></td>
                                <td>
                                    <?php if ($dt['id_mst_status_order'] == 0): ?>
                                        <button class="btn btn-sm btn-primary" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Tambah Detail</button>
                                    <?php elseif($dt['id_mst_status_order'] == 1) : ?>
                                        <button class="btn btn-sm btn-warning" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Menunggu Konfirmasi</button>
                                    <?php elseif($dt['id_mst_status_order'] == 3 && ($dt['flag_status_purcase_order'] == 0 || $dt['flag_status_purcase_order'] == null)) : ?>
                                        <button class="btn btn-sm btn-info" onclick="return openPurcaseOrder('<?= $dt['id_trx_order_barang'] ?>')">Konfirmasi Purcase Order</button>                                    
                                    <?php elseif($dt['id_mst_status_order'] == 3 && ($dt['flag_status_purcase_order'] == 1 || $dt['flag_status_purcase_order'] == 2)) : ?>
                                        <button class="btn btn-sm btn-info" onclick="return openPurcaseOrder('<?= $dt['id_trx_order_barang'] ?>')">Purcase Order</button>
                                        <button class="btn btn-sm btn-info" onclick="return openProgress('<?= $dt['id_trx_order_barang'] ?>')">Lihat Detail</button>
                                    <?php endif ?>
                                </td>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>

<script>
(function (){
    $(document).unbind().on('click', '.btn-buat-pesanan', function(e){
        e.preventDefault()
        $.ajax({
            url : base_url+'createPesanan',
            method : 'post',
            data : $('#formPesanan').serialize(),
            dataType : 'json',
            success : (data) => {
                $('#content-wrapper').load(base_url+'orderBarang')        
            },
            error : (err) => {
                console.log(err)
            }
        })
    })

    openDetailPesanan = (id) => {
        $('#content-wrapper').load(base_url+'orderBarangDetail/'+id)
    }
    
    openPurcaseOrder = (id) => {
        $('#content-wrapper').load(base_url+'purcaseOrder/'+id)
    }

    openProgress = (id) => {
        $('#content-wrapper').load(base_url+'orderBarangDetail/'+id)
    }
    
}())
</script>