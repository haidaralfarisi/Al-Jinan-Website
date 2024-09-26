<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>{{ $tpu->nama_tpu }}</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="#home" class="active">Home</a></li>
                        <li><a href="#tpu">TPU</a></li>
                        <li><a href="#blok_makam">Blok Makam</a></li>
                        <li><a href="#contact_us">Contact Us</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-calendar"></i> Daftar Disini</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
