<!DOCTYPE html>
<html lang="zxx">
@include('shop.include.head')
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    @include('shop.include.navbar')
    <!-- Header section end-->

    
    <!-- Intro section -->
    @include('shop.include.intro')
    <!-- Intro section end-->

    <!-- Blog section -->
    @include('shop.include.blog')
    @include('sweetalert::alert')
    <!-- Blog section end-->

    <!-- Back to top -->
    <div class="container">
        <div class="backtotop">
            <div class="up-btn" id="backTotop">UP</div>
        </div>
    </div>

    <!-- Footer section -->
    @include('shop.include.footer')
    <!-- Footer section end -->
    </body>
</html>
