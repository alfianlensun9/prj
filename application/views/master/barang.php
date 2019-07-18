<div class="form-row">        
    <div class="col-12">            
        <strong>Master Barang</strong>
    </div>        
    <div class="col-lg-12 mt-3">
        <div class="form-row">
            <div class="col-lg-12"> 
                <form action="#" method="post" id="form-masterBarang">
                <div class="form-row">
                    <div class="col-lg-2 mt-3">
                        <label for="">Nama Barang</label>
                    </div>
                    <div class="form-group col-lg-6 mt-2">                        
                        <input type="text" class="form-control form-control-sm" name="nm_barang">
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm mb-2" id="createMasterBarang">Tambah</button>                                
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
                    <th>Opsi</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataMasterBarang == null) :  ?>
                        <tr>
                            <td colspan="3">Tidak Ada Barang</td>
                        </tr>
                    <?php endif ?>
                    <?php 
                    $no = 1;
                    foreach ($dataMasterBarang as $dt): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['nm_barang'] ?></td>
                            <td><button class="btn btn-sm btn-danger" onclick = "return deleteMasterBarang('<?= $dt['id_mst_barang'] ?>')">Hapus</button></td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </div>
        </div>            
    </div>
</div>

<script>
(function(){

    deleteMasterBarang = (id) => {
        $.ajax({
            url : base_url+'hapusMasterBarang',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'masterBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    }

    $(document).unbind().on('click', '#createMasterBarang', function(){
        $.ajax({
            url : base_url+'createMasterBarang',
            method : 'post',
            data : $('#form-masterBarang').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'masterBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    })
    
}())
</script>