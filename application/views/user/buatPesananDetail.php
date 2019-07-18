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
                        <?php if ($datapesanan['id_mst_status_order'] == 0): ?>         
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
                                <?php if ($datapesanan['id_mst_status_order'] == 0): ?>
                                <td><button class="btn btn-sm btn-danger" onclick="return hapusDetail('<?= $dt['id_trx_order_barang_detail'] ?>')">Hapus</button></td>                                
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
    
}())
</script>