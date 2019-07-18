<div class="form-row">            
    <div class="col-lg-12 ">
        <div class="form-row">            
            <div class="col-lg-12 mt-4">
                <strong>Daftar Pesanan</strong>
            </div>               
            <div class="col-lg-12">                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Pesanan</th>                    
                        <th scope="col">Opsi</th>                    
                        </tr>
                    </thead>
                    <tbody id="tbody-pesanan">
                        <?php 
                            $no = 1;
                            foreach($datapesanan as $dt): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= formatDate($dt['tanggal_order']) ?></td>
                                <td>
                                    <?php if ($dt['id_mst_status_order'] == 0): ?>
                                        <button class="btn btn-sm btn-primary" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Lihat Detail</button>
                                    <?php elseif($dt['id_mst_status_order'] == 1) : ?>
                                        <button class="btn btn-sm btn-warning" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Menunggu Konfirmasi</button>
                                    <?php elseif($dt['id_mst_status_order'] == 2 && $role == 2) : ?>
                                        <button class="btn btn-sm btn-success" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Telah Ada Rincian</button>
                                        <?php if ($dt['id_trx_purcase_order'] == null) : ?>
                                        <button class="btn btn-sm btn-primary" onclick="return openPurcaseOrder('<?= $dt['id_trx_order_barang'] ?>')">Buat Purcase Order</button>
                                        <?php else : ?>
                                        <button class="btn btn-sm btn-success" onclick="return openPurcaseOrder('<?= $dt['id_trx_order_barang'] ?>')">Lihat Purcase Order</button>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-primary" onclick="return openDetailPesanan('<?= $dt['id_trx_order_barang'] ?>')">Lihat Detail</button>                
                                    <?php endif ?>
                                </td>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>

<script>
(function (){    

    openDetailPesanan = (id) => {
        $('#content-wrapper').load(base_url+'orderBarangDetail/'+id)
    }

    openPurcaseOrder = (id) => {
        $('#content-wrapper').load(base_url+'purcaseOrder/'+id)
    }
    
}())
</script>