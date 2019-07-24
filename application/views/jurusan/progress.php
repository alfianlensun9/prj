<div class="form-row">            
    <div class="col-lg-12 ">
        <form action="#" method="post" id="form-progress">
        <div class="form-row">            
            <div class="col-lg-12 mt-4">
                <strong>Progress Pesanan</strong>                
            </div>               
            <?php if ($role == 4 && $orderdetail['flag_produksi'] == 0): ?>
            <div class="col-12">
                <input type="hidden" name="id_trx_order_barang_detail" value="<?= $id_trx_order_barang_detail ?>">
                <div class="form-row">
                    <div class="col-lg-2 mt-3">
                        <label for="">Detail Progress</label>
                    </div>
                    <div class="form-group col-lg-5 mt-2">                                       
                        <input type="text" name="detail_progress" class="form-control form-control-sm">
                    </div>                    
                    <div class="col-lg-4">
                        <button type="button" id="tambahProgress" onclick="return addProgress('<?= $id_trx_order_barang_detail ?>')" class="btn btn-sm btn-primary">Tambah Progress <i class="fa fa-plus"></i></button>
                    </div>
                </div>  
            </div>            
            <?php endif ?>
            <div class="col-lg-12">                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Detail Progress</th>                                                           
                        </tr>
                    </thead>
                    <tbody id="tbody-pesanan">                        
                        <?php if ($dataprogress == null): ?>
                            <tr><td>Menunggu progress</td></tr>
                        <?php endif ?>
                        <?php 
                        $no = 1;
                        foreach ($dataprogress as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['detail_progress'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>      
        </form>      
    </div>
</div>
<div style="position: fixed; bottom: 2%; right : 3%">
    <?php if ($orderdetail['flag_produksi'] == 1) :  ?>    
    <button class="btn-sm btn btn-primary" onclick="return progressSelesai('<?= $id_trx_order_barang_detail ?>')">Selesai <i class="fa fa-check"></i></button>
    <?php else :  ?>
    <button class="btn-sm btn btn-success" >Telah Selesai <i class="fa fa-check"></i></button>
    <?php endif ?>
</div>
<script>
(function(){
    addProgress = (id) => {        
        $.ajax({
            url : base_url+'createProgress',
            method : 'post',
            data : $('#form-progress').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'progress/'+id)
            },
            error : function (err){
                console.log(err)
            }
        })
    }

    progressSelesai = (id) => {
        $.ajax({
            url : base_url+'progressSelesai',
            method : 'post',
            dataType : 'json',
            data : {
                id : id
            },
            success : function(data){
                $('#content-wrapper').load(base_url+'progress/'+id)
            },
            error : function(err)
            {
                console.log(err)
            }
        })
    }
}())

</script>