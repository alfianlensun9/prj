<div class="form-row">    
    <?php if ($datapesanan['id_mst_status_order'] == 0): ?>    
    <div class="col-12">            
        <strong>Buat Pesanan Detail</strong>
    </div>        
    <?php endif ?>
    <div class="col-lg-12 mt-3">        
        <div class="form-row">  
            <?php if ($datapesanan['id_mst_status_order'] == 0): ?>
            <div class="col-lg-12">
                <form action="#" method="post" class="form-row" id="formPesananDetail">          
                    <input type="hidden" name="id_trx_order_barang" value="<?= $datapesanan['id_trx_order_barang'] ?>">
                    <div class="col-lg-8">                 
                        <div class="form-row">
                            <div class="col-lg-4 mt-2">
                                <label for="">Nama Barang</label>
                            </div>
                            <div class="form-group col-lg-8 mt-2">                        
                                <input type="text" class="form-control form-control-sm" name="nm_trx_order_barang_detail">
                            </div>                            
                        </div>                                            
                    </div>         
                    <div class="col-lg-8">                 
                        <div class="form-row">
                            <div class="col-lg-4 mt-2">
                                <label for="">Jumlah Barang</label>
                            </div>
                            <div class="form-group col-lg-5 mt-2">                        
                                <input type="text" class="form-control form-control-sm" name="qty_barang">
                            </div> 
                            <div class="col-lg-3"> 
                                <button type="button" class="btn btn-primary btn-buat-pesanan-detail btn-sm float-right">
                                    Tambah <i class="fa fa-plus"></i>
                                </button>       
                            </div>                                           
                        </div>                                            
                    </div> 
                </form>
            </div>
            <?php endif ?>
                                
            <div class="col-lg-12 mt-4">
                <strong>Daftar Pesanan</strong>
            </div>               
            <div class="col-lg-12">                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>                    
                        <th scope="col">Jml Barang</th>                                   
                        <th scope="col">Opsi</th>                                                                    
                        </tr>
                    </thead>
                    <tbody id="tbody-pesanan">                                                
                        <?php 
                            $no = 1;
                            foreach($datapesanandetail as $dt): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['nm_trx_order_barang_detail'] ?></td>
                                <td><?= $dt['qty_barang'] ?></td>
                                <?php if ($datapesanan['id_mst_status_order'] == 0): ?>
                                <td><button class="btn btn-sm btn-danger" onclick="return hapusDetail('<?= $dt['id_trx_order_barang_detail'] ?>')">Hapus</button></td>                                
                                <?php endif ?>
                                <?php if ($dt['flag_produksi'] == 1): ?>
                                <td>                                    
                                    <button class="btn btn-sm btn-info" onclick="return lihatProgress('<?= $dt['id_trx_order_barang_detail'] ?>')">Lihat Progress</button>
                                </td>                                
                                <?php endif ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($datapesanan['id_mst_status_order'] == 0): ?>
            <div style="position: fixed; bottom: 5%; right : 3%">
                <button class="btn btn-sm btn-primary" onclick="return kirimPesanan('<?= $datapesanan['id_trx_order_barang'] ?>')">Kirim <i class="fa fa-paper-plane"></i></button>
            </div>
            <?php endif ?>
        </div>            
    </div>
</div>

<div class="modal fade" id="modalPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Rincian Harga - <span id="mdlNmBrg"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="col-12">                    
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-3">
                                    <strong>Jumlah Pesanan</strong>
                                </div>
                                <div class="col-6">
                                    : <span id="djlhpesanan"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-3">
                                    <strong>Harga Asli</strong>
                                </div>
                                <div class="col-6">
                                    : <span id="dharga_asli"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-3">
                                    <strong>Pajak</strong>
                                </div>
                                <div class="col-6">
                                    : <span id="dpajak"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col-3">
                                    <strong>Ongkir</strong>
                                </div>
                                <div class="col-6">
                                    : <span id="dongkir"></span>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <?php if ($datapesanan['id_mst_status_order'] == 1):  ?>
        <div class="modal-footer">                                
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary btn-sm" id="btn-simpanRincian">Simpan Rincian</button>
        </div>
        </div>
        <?php endif ?>
    </div>
</div>

<script>
(function (){
    $(document).on('click', '.btn-buat-pesanan-detail', function(e){
        e.preventDefault()        
        $.ajax({
            url : base_url+'createPesananDetail',
            method : 'post',
            data : $('#formPesananDetail').serialize(),
            dataType : 'json',
            success : (data) => {
                $('#tbody-pesanan').html('')
                let no = 1;
                $.each(data.result, (i, item) => {
                    $('#tbody-pesanan').append(
                        '<tr>'+
                            '<td>'+(no++)+'</td>'+
                            '<td>'+item.nm_trx_order_barang_detail+'</td>'+
                            '<td>'+item.qty_barang+'</td>'+
                            `<td><button class="btn btn-sm btn-danger" onclick="return hapusDetail('${item.id_trx_order_barang_detail}, ${item.id_trx_order_barang}')">Hapus</button></td>`+
                        '</tr>'
                    );
                })
            },
            error : (err) => {
                console.log(err)
            }
        })
    })

    hapusDetail = (id,idOrder) => {
        $.ajax({
            url : base_url+'hapusPesanan',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : (data) => {                
                $('#content-wrapper').load(base_url+'orderBarangDetail/'+idOrder)
            },
            error : (err) => {
                console.log(err)
            }
        })
    }

    kirimPesanan = (id) => {
        $.ajax({
            url : base_url+'kirimPesanan',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : (data) => {
                $('#content-wrapper').load(base_url+'orderBarang/')
            },
            error : (err) => {
                console.log(err)
            }
        })
    }

    lihatProgress = (id) => {
        $('#content-wrapper').load(base_url+'progress/'+id)
    }
    
}())
</script>