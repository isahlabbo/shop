    <section class="intro-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    @if(!is_null($shop->image))
                        <img src="{{storage_url($shop->image)}}" height="300" width="400" class="radius">
                    @else
                        <img src="{{asset('img/tailor 1.jpg')}}" height="300" width="400" class="radius">
                    @endif
                </div>
                <div class="col-lg-7 intro-text">
                    <span>{{$shop->name}},</span>
                    <h2>"{{$shop->words}}"</h2>
                    <p>{{$shop->about}}</p>
                </div>
            </div>
        </div>
    </section>