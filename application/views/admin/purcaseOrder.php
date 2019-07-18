<div class="form-row">            
    <div class="col-lg-12 ">
        <div class="form-row">            
            <div class="col-lg-12 mt-4">
                <strong>Purcase Order</strong>
                <?php if (isset($datapurcaseorder) && $datapurcaseorder['flag_status_purcase_order'] == 1): ?>
                <span class="badge badge-success">Di Terima</span>
                <?php elseif (isset($datapurcaseorder) && $datapurcaseorder['flag_status_purcase_order'] == 2):?>
                <span class="badge badge-danger">Di Tolak</span>
                <?php endif ?>
            </div>                  
            <?php if ($datapesanan['id_trx_purcase_order'] == null) :?>
            <div class="col-lg-12 mt-2" style="background-color : #eee; padding-top : 4%; padding-bottom :3%; padding-left : 2%; border-radius : 10px">
                <form action="#" method="post" id="form-purcaseOrder">
                <div class="form-row">
                    <div class="col-5">                    
                        <div class="form-row">
                            <div class="col-4">
                                Kode Pesanan
                            </div>
                            <div class="col-8">
                                <div class="form-group form-row">
                                    <input type="text" name="kode_pesanan" class="form-control form-control-sm col-12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div class="form-row">
                            <div class="col-3">
                                Di Order Ke
                            </div>
                            <div class="col-9">
                                <div class="form-group form-row">
                                    <select name="id_tujuan_order" id="" class="form-control form-control-sm">
                                        <?php foreach ($masterJurusan as $jurusan): ?>
                                            <option value="<?= $jurusan['id_mst_jurusan'] ?>"><?= $jurusan['nm_jurusan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-5">
                                <div class="form-row">
                                    <div class="col-4">
                                        Tanggal Order
                                    </div>
                                    <div class="col-8">
                                        <strong><?= formatDate($datapesanan['tanggal_order']) ?></strong>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>                   
                </div>
                </form>
            </div>   
            <?php endif ?>                            
            <?php if (isset($datapurcaseorder)): ?>
            <div class="col-lg-12 mt-2" style="background-color : #eee; padding-top : 4%; padding-bottom :3%; padding-left : 2%; border-radius : 10px">
                <form action="#" method="post" id="form-purcaseOrder">
                <div class="form-row">
                    <div class="col-5">                    
                        <div class="form-row">
                            <div class="col-4">
                                Kode Pesanan
                            </div>
                            <div class="col-8">
                                <div class="form-group form-row">
                                    <strong><?= $datapurcaseorder['kode_pesanan'] ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div class="form-row">
                            <div class="col-3">
                                Di Order Ke
                            </div>
                            <div class="col-9">
                                <strong><?= $datapurcaseorder['nm_jurusan'] ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-5">
                                <div class="form-row">
                                    <div class="col-4">
                                        Tanggal Order
                                    </div>
                                    <div class="col-8">
                                        <strong><?= formatDate($datapesanan['tanggal_order']) ?></strong>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>                   
                </div>
                </form>
            </div>   
            <?php endif ?>
            <div class="col-lg-12 mt-4">
                <strong>Deskripsi</strong>                
            </div>
            <div class="col-lg-12 mt-2" style="background-color : #eee; padding-top : 4%; padding-bottom :3%; padding-left : 2%; border-radius : 10px">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>                    
                        <th scope="col">Jml Barang</th>                                       
                        <th scope="col">Harga Asli</th>           
                        <th scope="col">Ongkir</th>           
                        <th scope="col">Pajak</th>           
                        <th scope="col">Total</th>  
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
                                <td><?= $dt['harga_asli'] ?></td>                                    
                                <td><?= $dt['ongkir'] ?></td>                                    
                                <td><?= $dt['pajak'] ?></td>                                    
                                <td><?= '-' ?></td>                                    
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>            
            <div class="col-lg-12 mt-4">                
                <?php if (isset($datapurcaseorder) && $datapurcaseorder['flag_status_purcase_order'] == 0): ?>
                <button type="button" onclick="return konfirmasiPurcaseOrder(1,'<?= $datapurcaseorder['id_trx_purcase_order'] ?>')" class="btn btn-sm btn-success" >Terima <i class="fa fa-check"></i></button>
                <button type="button" onclick="return konfirmasiPurcaseOrder(2,'<?= $datapurcaseorder['id_trx_purcase_order'] ?>')" class="btn btn-sm btn-danger">Tolak <i class="fa fa-times"></i></button>
                <?php endif ?>
                <?php if ($datapesanan['id_trx_purcase_order'] == null) :?>
                <button type="button" class="btn btn-sm btn-primary" id="kirimPurcaseOrder">Kirim <i class="fa fa-paper-plane"></i></button>
                <?php elseif ($datapesanan['id_trx_purcase_order'] != null && isset($datapurcaseorder)) : ?>
                <button type="button" class="btn btn-sm btn-info" id="cetak">Cetak <i class="fa fa-print"></i></button>
                <?php endif ?>
            </div>
        </div>            
    </div>
</div>

<script>
(function (){    
    konfirmasiPurcaseOrder = (ev, id) => {
        $.ajax({
            url : base_url+'konfirmasiPurcaseOrder/'+id,
            method : 'post',
            data : {
                ev : ev
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

    $(document).unbind().on('click','#kirimPurcaseOrder', function(){                
        $.ajax({
            url : base_url+'createPurcaseOrder/<?= $datapesanan['id_trx_order_barang'] ?>',
            method : 'post',
            data : $('#form-purcaseOrder').serialize(),
            dataType : 'json',
            success : function (data){
                $('#content-wrapper').load(base_url+'orderBarang')
            },
            error : function (err){
                console.log(err)
            }
        })
    })
    
}())
</script>