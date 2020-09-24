    <section class="blog-section spad">
        <div class="container">
            <div class="blog-slider owl-carousel">
           
                @foreach($shop->programmes as $programme)
                <div class="blog-item">
                    <div class="blog-thumb set-bg" data-setbg="img/blog/1.jpg">
                        <div class="blog-date">
                            <h2>20</h2>
                            <p>Jan</p>                                  
                        </div>
                    </div>
                    <div class="blog-head">
                        <div class="blog-tags">Fee, #{{$programme->fee}}</div>
                        <h2><a href="single-blog.html">Duration {{$programme->duration}} Months</a></h2>
                    </div>
                    <p>{{$programme->about}}</p>
                </div>
                @endforeach  
            </div>
        </div>
    </section>