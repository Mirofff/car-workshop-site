<html lang="ru">

@include('components.head')

<body>
<!-- 01 Preloader -->
<div class="loader-wrapper" id="loader-wrapper">
    <div class="loader"></div>
</div>
<!-- Preloader end -->
<!-- 02 Main page -->
<section class="page-section">
    <div class="full-width-screen">
        <div class="container-fluid">
            <div class="content-detail">
                <div class="pendulum-platform">
                    <div class="pendulum-holder"></div>
                    <div class="pendulum-thread">
                        <div class="pendulum-knob"></div>
                        <div class="pendulum">404</div>
                    </div>
                    <div class="pendulum-shadow"></div>
                </div>
                <div class="text-detail">
                    <h4 class="sub-title">Oops!</h4>
                    <p class="detail-text">We're sorry,<br>Page is forbidden for you(</p>
                    <div class="back-btn">
                        <a href="{{route('dashboard')}}" class="btn">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>
