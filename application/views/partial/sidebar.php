<div class="col-12">
<div class="form-row">
<div class="col-lg-3">
    <div class="form-row sidebarContainer">        
        <?php if ($role == 1) :  ?>
        <div class="col-lg-12 cardSideBar activeSidebar" id="nav-pesananUser">            
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-handshake"></i>
                </div>
                <div class="col-lg-9">
                    Pesanan
                </div>
            </div>
        </div>
        <?php elseif ($role == 3) :  ?>
        <div class="col-lg-12 cardSideBar activeSidebar" id="nav-pesananKeu">            
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-handshake"></i>
                </div>
                <div class="col-lg-9">
                    Pesanan
                </div>
            </div>
        </div>
        <?php elseif ($role == 2) :  ?>
        <div class="col-lg-12 cardSideBar activeSidebar" id="nav-pesananAdm">            
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-handshake"></i>
                </div>
                <div class="col-lg-9">
                    Pesanan
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if ($role == 2) :  ?>       
        <div class="col-lg-12 cardSideBar" id="nav-masterjurusan">
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-building"></i>
                </div>
                <div class="col-lg-9">
                    Master Jurusan
                </div>
            </div>
        </div>
        <div class="col-lg-12 cardSideBar" id="nav-otentikasi">
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-users"></i>
                </div>
                <div class="col-lg-7">
                    Otentikasi
                </div>                        
            </div>
        </div>
        <?php endif ?>
        <?php if ($role == 4) :  ?>
        <div class="col-lg-12 cardSideBar activeSidebar" id="nav-pesananJurusan">
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-list"></i>
                </div>
                <div class="col-lg-9">
                    Order Produk
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if ($role == 5) :  ?>
        <div class="col-lg-12 cardSideBar" id="nav-stockbarang">
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-list"></i>
                </div>
                <div class="col-lg-9">
                    Stock Barang
                </div>
            </div>
        </div>
        <div class="col-lg-12 cardSideBar" id="nav-masterbarang">
            <div class="form-row">
                <div class="col-lg-2">
                    <i class="ml-2 fa fa-toolbox"></i>
                </div>
                <div class="col-lg-9">
                    Master Barang
                </div>
            </div>
        </div>       
        
        <?php endif ?>
        
    </div>
</div>        

<script>  
  
document.addEventListener('DOMContentLoaded', () => {        
    loadView = async (uri, title, element) => {    
        $('.cardSideBar').removeClass('activeSidebar')    
        $('#'+element).addClass('activeSidebar')
        $('#content-wrapper').load(base_url+uri)        
        document.title = title        
    }            
    let pesananuser = document.querySelector('#nav-pesananUser')
    let pesanankeu = document.querySelector('#nav-pesananKeu')
    let pesananadm = document.querySelector('#nav-pesananAdm')
    let pesananJurusan = document.querySelector('#nav-pesananJurusan')
    let masterbarang = document.querySelector('#nav-masterbarang');        
    let masterjurusan = document.querySelector('#nav-masterjurusan');     
    let otentikasi = document.querySelector('#nav-otentikasi');         
    let stockbarang = document.querySelector('#nav-stockbarang');

    if (pesananuser){
        loadView('orderBarang', 'Pesanan','nav-pesananUser')    
        pesananuser.addEventListener('click' , () => {               
            loadView('orderBarang', 'Pesanan','nav-pesananUser')    
        })
    }    
    if (pesanankeu){
        loadView('orderBarang', 'Halaman Utama','nav-pesananKeu')    
        pesanankeu.addEventListener('click' , () => {   
            loadView('orderBarang', 'Halaman Utama','nav-pesananKeu')    
        })    
    }

    if (pesananJurusan){
        loadView('orderBarang', 'Halaman Utama','nav-pesananJurusan')    
        pesananJurusan.addEventListener('click' , () => {   
            loadView('orderBarang', 'Halaman Utama','nav-pesananJurusan')    
        })    
    }
    
    if (pesananadm){
        loadView('orderBarang', 'Halaman Utama','nav-pesananAdm')   
        pesananadm.addEventListener('click' , () => {           
            loadView('orderBarang', 'Halaman Utama','nav-pesananAdm')    
        })
    }    

    if (masterbarang){
        masterbarang.addEventListener('click' , () => {
            loadView('masterBarang','Master Barang','nav-masterbarang')
        })
    }

    if (masterjurusan){
        masterjurusan.addEventListener('click' , () => {        
            loadView('masterJurusan','Master Jurusan','nav-masterjurusan')
        })
    }
    if (otentikasi){
        otentikasi.addEventListener('click', () => {
            loadView('otentikasi', 'Otentikasi','nav-otentikasi')
        })   
    }

    if (stockbarang){
        stockbarang.addEventListener('click', () => {
            loadView('stockBarang', 'Stock Barang','nav-stockbarang')
        })   
    }
        
})    
</script>

<style>
    .activeSidebar{
        background-color : #aaa;
    }

    .cardSideBar:hover{   
        background-color : #aaa;
        cursor : pointer;
    }
    .cardSideBar{           
        margin-top : 20px;
        padding-left : 30px;
        padding-top : 10px;             
        padding-bottom : 10px;             
        border-radius : 30px;
        transition : .4s ease;
    }
    .sidebarContainer{
        padding : 20px;
    }
</style>