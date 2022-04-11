<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('client.home.index') }}"> <img src="image/client/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                    <menus/>
                    </div>
                    <div class="hearer_icon d-flex">
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="{{ route('client.cart.index') }}"role="button">
                                <i class="fas fa-cart-plus"><span>{{ cart('count') }}</span></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
