<div class="form-row">        
    <div class="col-12">            
        <strong>Rincian Produk</strong>
    </div>        
    <div class="col-lg-12 mt-3">
        <div class="form-row">        
            <?php if ($dataOrderBarangdetail['flag_rincian_produk'] != 1) : ?>
            <div class="col-lg-12"> 
                <form action="#" method="post" id="form-rincianProduk">
                <input type="hidden" name="id_trx_order_barang_detail" value="<?= $id_trx_order_barang_detail ?>">                
                <div class="form-row">
                    <div class="col-lg-3 mt-3">
                        <label for="">Nama Barang Di Perlukan</label>
                    </div>
                    <div class="form-group col-lg-6 mt-2">                                       
                        <select name="id_mst_barang" id="id_mst_barang" >
                        <?php foreach ($list_barang as $lb): ?>
                            <option value="<?= $lb['id_mst_barang'] ?>"><?= $lb['nm_barang'] ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>                    
                </div>    
                <div class="form-row">
                    <div class="col-lg-3 mt-3">
                        <label for="">Jumlah Barang</label>
                    </div>
                    <div class="form-group col-lg-4 mt-2">                        
                        <input type="number" class="form-control form-control-sm" name="qty_barang">
                    </div>       
                    <div class="col-lg-2">
                        <button type="button" onclick="return insertRincian('<?= $id_trx_order_barang_detail ?>')" class="btn btn-primary btn-sm mb-2" id="createMasterBarang">Tambah Rincian</button>                                
                    </div>                                            
                </div>                   
                </form>
            </div>
            <?php endif ?>
            <div class="col-lg-12">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang Pendukung   </th>  
                    <th>Jumlah Barang</th>          
                    <?php if ($role == 4) :  ?>          
                    <th>Jumlah Stock Barang</th>
                    <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataRincianProduk == null) : ?>
                        <tr>
                            <td>Tidak Ada Rincian</td>
                        </tr>
                    <?php endif ?>
                    <?php 
                    $no = 1;
                    foreach ($dataRincianProduk as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['nm_barang'] ?></td>
                            <td><?= $dt['qty_rincian'] ?></td>
                            <?php if ($role == 4) :  ?> 
                            <td><?= $dt['jlh_stock'] == null ? '0' : $dt['jlh_stock'] ?></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>            
    </div>
</div>
<?php if ($dataOrderBarangdetail['flag_rincian_produk'] != 1) : ?>
<div style="position: fixed; bottom: 5%; right : 3%">
    <button class="btn btn-sm btn-primary" onclick="return konfirmasiRincianProduk('<?= $id_trx_order_barang_detail ?>')">Selesai <i class="fa fa-check"></i></button>
</div>
<?php endif ?>
<?php if ($dataOrderBarangdetail['flag_rincian_produk'] == 1 && $role == 4 && $dataOrderBarangdetail['flag_produksi'] == 0) : ?>
    <div style="position: fixed; bottom: 5%; right : 3%">
        <button class="btn btn-sm btn-primary" onclick="return produksi('<?= $id_trx_order_barang_detail ?>')">Produksi <i class="fa fa-hammer"></i></button>
    </div>
<?php endif ?>
<?php if ($role == 4 && $dataOrderBarangdetail['flag_produksi'] == 1) :?>
    <div style="position: fixed; bottom: 5%; right : 3%">
        <button class="btn btn-sm btn-primary">Sementara Di Produksi <i class="fa fa-spin fa-spinner"></i></button>
    </div>
<?php else : ?>
    <div style="position: fixed; bottom: 5%; right : 3%">
        <button class="btn btn-sm btn-success">Selesai <i class="fa fa-check"></i></button>
    </div>
<?php endif ?>
<script src="<?= base_url('assets/js/selectize/selectize.js') ?>"></script>
<script>
(function(){    
    $('#id_mst_barang').selectize()

    insertRincian = (id) => {
        $.ajax({
            url : base_url+'createRincianProduk',
            method : 'post',
            data : $('#form-rincianProduk').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'rincianProduk/'+id)
            },
            error : function (err){
                console.log(err)
            }
        })
    }

    konfirmasiRincianProduk = (id) => {
        $.ajax({
            url : base_url+'konfirmasiRincianProduk',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'orderBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    }

    produksi = (id) => {
        $.ajax({
            url : base_url+'produksi',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : function (data){                
                $('#content-wrapper').load(base_url+'orderBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    }

}())
</script>