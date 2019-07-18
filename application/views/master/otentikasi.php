<div class="form-row">        
    <div class="col-12">            
        <strong>Manage Pengguna</strong>
    </div>        
    <div class="col-lg-8">
        <form action="" id="form-tambahuser" method="post">
        <div class="form-row pt-3">
            <div class="form-group col-8">
                <label for="">Nama User</label>
                <input type="text" name="username" id="username" class="form-control form-control-sm">
            </div>
            <div class="form-group col-4">
                <label for="">Role</label>
                <select name="role" class="form-control form-control-sm">
                    <?php foreach ($selectRole as $role) : ?>
                        <option value="<?= $role['id_role_user'] ?>"><?= $role['nm_role'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-8">
                <label for="">Kata Sandi</label>
                <input type="password" onkeyup="return cekPass()" name="password" id="pass" class="form-control form-control-sm">
            </div>
            <div class="form-group col-8">
                <label for="">Konfirmasi Kata Sandi</label>
                <input type="password" onkeyup="return cekPass()" id="passcek" class="form-control form-control-sm">
            </div>
            <div class="col-lg-2 pt-4 mt-2">
            <span class="badge badge-warning" style="display : none" id="labelveriftc">Tidak Cocok</span>
            <span class="badge badge-success" style="display : none" id="labelverifc">Cocok <i class="fa fa-check"></i></span>
            </div>
            <div class="form-group col-6">
                <button type="button" id="buatAkun" class="btn btn-sm btn-primary">Buat Akun <i class="fa fa-plus"></i></button>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="form-row">            
            <div class="col-lg-12">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama User</th>                    
                    <th scope="col">Kata Sandi</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?= $dataauth == null ? '<tr><td colspan="2">Tidak Ada User</td></tr>' : '' ?>
                    <?php 
                    $no = 1;
                    foreach ($dataauth as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['username'] ?></td>
                            <td>*****</td>
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
        cekPass = () => {
            if ($('#passcek').val() != $('#pass').val() && $('#passcek').val() != ''){
                $('#labelveriftc').show()
                $('#labelverifc').hide()
                
            }
            if ($('#passcek').val() == $('#pass').val()){
                $('#labelverifc').show()
                $('#labelveriftc').hide()
            }
        }        

        $(document).unbind().on('click', '#buatAkun', function (e){
            e.stopPropagation()
            if ($('#passcek').val() == $('#pass').val() && $('#username').val() != ''){
                $.ajax({
                    url : base_url+'createAkun',
                    method : 'post',
                    data : $('#form-tambahuser').serialize(),
                    dataType : 'json',
                    success : function (data){
                        $('#content-wrapper').load(base_url+'otentikasi')                
                    },
                    error : function (err){
                        console.log(err)
                    }
                })
            } else {
                Alert('Lengkapi Data Dengan Benar')
            }
        })
    }())

</script>