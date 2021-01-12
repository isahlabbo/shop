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
                        <a class="nav-link" href="#">Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shop.customer.index',[$shop->id]) }}">customers</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shop.design.index',[$shop->id]) }}">Designs</a>
                    </li>
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            configuration
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('admin.shop.configuration.benefit.plan',[$shop->id])}}"></i> Shop Benfit plan</a>
                        </div>
                    </li>                                                               
                </ul>
                
            </div>
        </nav>
    </header>