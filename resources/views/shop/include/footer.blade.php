    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget fw-about">
                        <img src="img/footer-logo.png" alt="">
                        <p>{{$shop->about}}.</p>
                        <div class="fw-social">
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget resent-post">
                        <h2 class="fw-title">Programmes</h2>
                        @foreach($shop->programmes as $programme)
                        <div class="rp-item">
                            <h4>{{$programme->name}}</h4>
                            <span>{{$programme->created_at}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h2 class="fw-title">Usefull Links</h2>
                        <ul>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Reviews</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Subscribe</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget contact-widget">
                        <h2 class="fw-title">Contact</h2>
                        <ul>
                            <li><span>Address:</span>
                            {{admin()->address->name}}
                            ,{{admin()->address->area->name}}
                            ,{{admin()->address->area->town->name}}
                            ,{{admin()->address->area->town->lga->name}}
                            ,{{admin()->address->area->town->lga->state->name}}
                            </li>
                            <li><span>Phone:</span>{{admin()->phone}}</li>
                            <li><span>Mail:</span>{{admin()->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> AISTYLE All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </div>
        
         <!--====== Javascripts & Jquery ======-->
        @include('include.footer.scripts')

    </footer>