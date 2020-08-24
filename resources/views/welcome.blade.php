<!DOCTYPE html>
<html lang="zxx">
@include('include.header.head')
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    @include('include.header.navbar')
    <!-- Header section end-->

    <!-- Slide section -->
    @include('include.body.slide')
    <!-- Slide section end-->

    <!-- Intro section -->
    @include('include.body.intro')
    <!-- Intro section end-->

    <!-- design section -->
    @include('include.body.design')
    <!-- design section end-->

    <!-- Blog section -->
    @include('include.body.blog')
    <!-- Blog section end-->

    <!-- Back to top -->
    <div class="container">
        <div class="backtotop">
            <div class="up-btn" id="backTotop">UP</div>
        </div>
    </div>

    <!-- Footer section -->
    @include('include.footer.footer')
    <!-- Footer section end -->
    </body>
</html>
