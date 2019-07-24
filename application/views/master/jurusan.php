<div class="form-row">        
    <div class="col-12">            
        <strong>Master Jurusan</strong>
    </div>        
    <div class="col-lg-12 mt-3">
        <div class="form-row">
            <div class="col-lg-12"> 
                <form action="#" method="post" id="form-masterJurusan">
                <div class="form-row">
                    <div class="col-lg-2 mt-3">
                        <label for="">Nama Jurusan</label>
                    </div>
                    <div class="form-group col-lg-6 mt-2">                        
                        <input type="text" class="form-control form-control-sm" name="nm_jurusan">
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm mb-2" id="createMasterJurusan">Tambah</button>                                
                    </div>
                </div>        
                </form>

            </div>
            <div class="col-lg-12">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jurusan</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataMasterJurusan == null) :  ?>
                        <tr>
                            <td colspan="3">Tidak Ada Barang</td>
                        </tr>
                    <?php endif ?>
                    <?php 
                    $no = 1;
                    foreach ($dataMasterJurusan as $dt): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['nm_jurusan'] ?></td>
                            <td><button class="btn btn-sm btn-danger" onclick = "return deleteMasterJurusan('<?= $dt['id_mst_jurusan'] ?>')">Hapus</button></td>
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

    deleteMasterJurusan = (id) => {
        $.ajax({
            url : base_url+'hapusMasterJurusan',
            method : 'post',
            data : {
                id : id
            },
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'masterJurusan')
            },
            error : function (err){
                console.log(err)
            }
        })
    }

    $(document).unbind().on('click', '#createMasterJurusan', function(){
        $.ajax({
            url : base_url+'createMasterJurusan',
            method : 'post',
            data : $('#form-masterJurusan').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'masterJurusan')
            },
            error : function (err){
                console.log(err)
            }
        })
    })
    
}())
</script>