<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-light light-color">
    <a class="navbar-brand" href="#" style="font-weight : 400">Sistem Penanganan Pesanan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
        
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
        
        <li class="nav-item">
            <a
                style="
                    margin-right : 20%
                "
            >
                <strong><?= $this->session->userdata('username') ?></strong>
            </a>            
        </li>
        <li class="nav-item" style="padding-left : 40">
            <a 
            style="
                    margin-right : 200
                "
            href="<?= base_url('logout') ?>"><i class="fa fa-arrow-right"></i></a>            
        </li>
        </ul>
    </div>
</nav>