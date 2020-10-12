    <header class="header-section">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark site-navbar">
            <a class="navbar-brand site-logo" href="index.html#">
                <h2><span>sewmy</span>cloth</h2>
                <p>Fashion Forward</p>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- Main menu -->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.shop.apparent.index',[$shop->id])}}">Apparantes</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shop.programme.index',[$shop->id]) }}">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.login') }}">Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shop.customer.index',[$shop->id]) }}">customers</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.login') }}">Designs</a>
                    </li>                                                                
                </ul>
                
            </div>
        </nav>
    </header>