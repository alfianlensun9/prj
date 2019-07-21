<div class="form-row">        
    <div class="col-12">            
        <strong>Stock Barang</strong>
    </div>        
    <div class="col-lg-12 mt-3">
        <div class="form-row">
            <div class="col-lg-12"> 
                <form action="#" method="post" id="form-stockBarang">
                <div class="form-row">
                    <div class="col-lg-2 mt-3">
                        <label for="">Nama Barang</label>
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
                    <div class="col-lg-2 mt-3">
                        <label for="">Jumlah Barang</label>
                    </div>
                    <div class="form-group col-lg-4 mt-2">                        
                        <input type="number" class="form-control form-control-sm" name="qty_barang">
                    </div>       
                    <div class="col-lg-2">
                        <button type="button" onclick="return insertStock()" class="btn btn-primary btn-sm mb-2" id="createMasterBarang">Tambah</button>                                
                    </div>                                            
                </div>                   
                </form>
            </div>
            <div class="col-lg-12">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>  
                    <th>Jumlah Barang</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataStock == null) : ?>
                        <tr>
                            <td>Tidak Ada Barang</td>
                        </tr>
                    <?php endif ?>
                    <?php 
                    $no = 1;
                    foreach ($dataStock as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['nm_barang'] ?></td>
                            <td><?= $dt['qty_barang'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>            
    </div>
</div>
<script src="<?= base_url('assets/js/selectize/selectize.js') ?>"></script>
<script>
(function(){    
    $('#id_mst_barang').selectize()

    insertStock = () => {
        $.ajax({
            url : base_url+'createStockBarang',
            method : 'post',
            data : $('#form-stockBarang').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'stockBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    }

}())
</script>