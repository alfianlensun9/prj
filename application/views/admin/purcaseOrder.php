<div class="form-row">            
    <div class="col-lg-12 ">
        <div class="form-row">            
            <div class="col-lg-12 mt-4">
                <strong>Purcase Order</strong>
            </div>        
            <div class="col-lg-12 mt-2" style="background-color : #eee; padding-top : 4%; padding-bottom :3%; padding-left : 2%; border-radius : 10px">
                <div class="form-row">
                    <div class="col-5">
                        <div class="form-row">
                            <div class="col-4">
                                Kode Pesanan
                            </div>
                            <div class="col-8">
                                <div class="form-group form-row">
                                    <input type="text" class="form-control form-control-sm col-12">
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
                                    <input type="text" class="form-control form-control-sm col-12">
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
            </div>                               
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
                <button class="btn btn-sm btn-primary">Kirim <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>            
    </div>
</div>

<script>
(function (){    
    
    
}())
</script>