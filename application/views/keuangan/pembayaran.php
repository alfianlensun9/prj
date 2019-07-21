<div class="form-row">        
    <div class="col-lg-12">        
        <div class="form-row  mt-4">                                             
            <div class="col-lg-12">
                <strong>Pembayaran</strong>
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
                                <td>
                                    <button class="btn btn-sm btn-success btnrinciandetail" data-toggle="modal" data-idOrderBarangDetail="<?= $dt['id_trx_order_barang_detail'] ?>" data-qtyBrg="<?= $dt['qty_barang'] ?>" data-namabarang="<?= $dt['nm_trx_order_barang_detail'] ?>" data-target="#modalRincian">Rincian Harga</button>                                    
                                </td>                                                                                                                          
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>            
            <div style="position: fixed; bottom: 5%; right : 3%">
                <button class="btn btn-sm btn-primary" onclick="return konfirmasiRincian('<?= $datapesanan['id_trx_order_barang'] ?>')">Bayar <i class="fa fa-check"></i></button>
            </div>            
        </div>            
    </div>
</div>


<script>
(function (){
    
    
}())
</script>