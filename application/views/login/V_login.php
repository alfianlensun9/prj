<style> 
    .welcome-container{
        margin-top :20%;
    }
    .login-wrapper{        
        margin-top :20%;
        border : 1px solid #ddd;
        border-radius : 10px;
    }
        
</style>
<div class="col-lg-12">
    <div class="row wrapper">
        <div class="col-lg-6 col-12 offset-lg-3">
            <div class="form-row login-wrapper p-4">                
                <div class="col-lg-12" style="text-align: center">
                    <h4 style="color : #202124">Login</h4>
                    <h5>Lanjutkan ke halaman utama</h5>
                </div>                
                <div class="col-lg-8 offset-lg-2 mt-4">
                    <form  method="post" id="form-login">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Masukan Nama Pengguna / No Telp / NIK">                                                                        
                        <span class="badge badge-warning" id="msg_username" style="display : none">Nama User tidak terdaftar</span>
                    </div>          
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Masukan Password">
                        <span class="badge badge-warning" id="msg_password" style="display : none">Password Salah</span>
                    </div>
                    <div class="form-row">                        
                        <div class="col-12">                            
                            <button type="button" class="btn btn-sm btn-primary float-right" id="login">
                                Login <i class="fa fa-arrow-right"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light float-right" id="daftar">
                                Mendaftar <i class="fa fa-pen"></i>
                            </button>                            
                        </div>
                    </div>                                            
                    </form>
                </div>                
            </div>
        </div>
        <div class="col-lg-6 col-12" >
            <div class="form-row">

            </div>
        </div>
    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', () => {        
    document.title = 'Login';

    $(document).unbind().on('click', '#login', function (){
        $.ajax({
            url : base_url+'cekLogin',
            method : 'post',
            data : $('#form-login').serialize(),
            dataType : 'json',
            success : function (data){
                if (data.metaData.code == 200){
                    window.location = base_url+'homepage'
                }
                else
                if (data.metaData.code == 201){
                    $('#msg_username').show()
                    $('#msg_password').hide()
                }
                else
                if (data.metaData.code == 202){
                    $('#msg_username').hide()
                    $('#msg_password').show()
                }
            },
            error : function (err){
                console.log(err)
            }
        })        
    })
})
</script>