<div class="form-row">        
    <div class="col-lg-12">        
        <div class="form-row  mt-4">                                             
            <div class="col-lg-12">
                <strong>Daftar Detail Pesanan</strong>
            </div>               
            <div class="col-lg-12">                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>                    
                        <th scope="col">Jml Barang</th>           
                        <th scope="col">Keterangan</th>      
                        <?php if ($datapesanan['id_mst_status_order'] == 1): ?>         
                        <th scope="col">Opsi</th>                    
                        <?php endif ?>
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
                                <td><?= $dt['keterangan'] ?></td>
                                <?php if ($dt['flag_create_rincian'] == 0): ?>
                                <td><button class="btn btn-sm btn-info btnrincian" data-toggle="modal" data-idOrderBarangDetail="<?= $dt['id_trx_order_barang_detail'] ?>" data-qtyBrg="<?= $dt['qty_barang'] ?>" data-namabarang="<?= $dt['nm_trx_order_barang_detail'] ?>" data-target="#modalRincian">Tambah Rincian</button></td>                                
                                <?php else : ?>
                                <td>
                                    <button class="btn btn-sm <?= $dt['flag_produksi'] == 1 ? 'btn-primary' : 'btn-success' ?> btnrinciandetail" data-flagp="<?= $dt['flag_produksi'] ?>" data-flagb="<?= $dt['flag_bayar'] ?>" data-toggle="modal" data-idOrderBarangDetail="<?= $dt['id_trx_order_barang_detail'] ?>" data-qtyBrg="<?= $dt['qty_barang'] ?>" data-namabarang="<?= $dt['nm_trx_order_barang_detail'] ?>" data-target="#modalRincian">Rincian Harga <?= $dt['flag_produksi'] == 1 ? '& Pembayaran' : '' ?></button>
                                </td>                                                                
                                <?php endif ?>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($datapesanan['id_mst_status_order'] == 1): ?>
            <div style="position: fixed; bottom: 5%; right : 3%">
                <button class="btn btn-sm btn-primary" onclick="return konfirmasiRincian('<?= $datapesanan['id_trx_order_barang'] ?>')">Konfirmasi <i class="fa fa-check"></i></button>
            </div>
            <?php endif ?>
        </div>            
    </div>
</div>

<div class="modal fade" id="modalRincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php if ($datapesanan['id_mst_status_order'] == 1):  ?>
                        <form action="#" id="form-rincianPesanan" method="post">
                            <div class="form-row">
                                <input type="hidden" name="id_trx_order_barang_detail" id="id_trx_order_barang_detail" class="input-ins-modal">
                                <div class="form-group col-6">
                                    <label for="">Harga Asli</label>
                                    <input type="number" name="harga_asli" class="form-control form-control-sm input-ins-modal">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Ongkir</label>
                                    <input type="number" name="ongkir" class="form-control form-control-sm input-ins-modal">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Pajak</label>
                                    <input type="number" name="pajak" class="form-control form-control-sm input-ins-modal">
                                </div>
                            </div>
                        </form>
                    <?php else :  ?>
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
                                    <div class="col-6" style="border-bottom : 1px solid #333">
                                        : <span id="dongkir"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="col-3">
                                        <strong>Total</strong>
                                    </div>
                                    <div class="col-6">
                                        : <span id="total"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php if ($datapesanan['id_mst_status_order'] == 1):  ?>
        <div class="modal-footer">                                
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary btn-sm" id="btn-simpanRincian">Simpan Rincian</button>                        
        </div>
        <?php endif ?>
        <button type="button" class="btn btn-primary btn-sm" id="btn-bayar" style="display : none">Bayar <i class="fa fa-check"></i></button>
    </div>
</div>

<script>
(function (){
    $(document).on('click', '.btnrincian', function (){
        let idOrderBarangDetail = $(this).data('idorderbarangdetail')            
        let nmBarang = $(this).data('namabarang')    
        let qtyBarang = $(this).data('qtyBrg')
        $('#mdlNmBrg').html(nmBarang)
        $('#id_trx_order_barang_detail').val(idOrderBarangDetail)
    })

    $(document).on('click', '.btnrinciandetail', function (){
        let idOrderBarangDetail = $(this).data('idorderbarangdetail')            
        let nmBarang = $(this).data('namabarang')    
        let qtyBarang = $(this).data('qtybrg')        
        let flagp = $(this).data('flagp')
        let flagb = $(this).data('flagb')
        
        $('#btn-bayar').attr('data-idorderdetail', idOrderBarangDetail)        
        $('#mdlNmBrg').html(nmBarang)
        $.ajax({
            url : base_url+'getRincianDetail',
            method : 'post',
            data : {
                id : idOrderBarangDetail
            },
            dataType : 'json',
            success : function (data){      
                if (flagp == 1 && flagb == 0){
                    $('#btn-bayar').show();
                }          
                $('#djlhpesanan').html(qtyBarang)
                $('#dharga_asli').html(data.harga_asli)
                $('#dongkir').html(data.ongkir)
                $('#dpajak').html(data.pajak)
                $('#total').html(parseInt(qtyBarang)*(parseInt(data.harga_asli)+parseInt(data.ongkir)+parseInt(data.pajak)))
            },
            error : function (err){
                console.log(err)
            }
        })

    })    

    $(document).on('click', '#btn-bayar', function(){
        let idorderdetail = $(this).data('idorderdetail');
        $.ajax({
            url : base_url+'bayar',
            method : 'post',
            data : {
                id : idorderdetail,
                jumlah_bayar : parseInt($('#total').html())
            },
            dataType : 'json',
            success : (data) => {
                $('#modalRincian').modal('hide')
            },
            error : (err) => {
                console.log(err)
            }
        })
    })

    $(document).on('click', '#btn-simpanRincian', function (){
        createRincian()
    })


    createRincian = () => {
        $.ajax({
            url : base_url+'createRincianPesanan',
            method : 'post',
            data : $('#form-rincianPesanan').serialize(),
            dataType : 'json',
            success : (data) => {
                $('#modalRincian').modal('hide')
            },
            error : (err) => {
                console.log(err)
            }
        })
        $('.input-ins-modal').val('')
    }

    konfirmasiRincian = (id) => {        
        $.ajax({
            url : base_url+'konfirmasiRincianPesanan',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : (data) => {
                $('#content-wrapper').load(base_url+'orderBarang')                
            },
            error : (err) => {
                console.log(err)
            }
        })
    }        
    
    
}())
</script>