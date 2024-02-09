@include('components.head')
@include('components.header', ['links' => [
    __('About us') => route('about').'#About',
    __('Info') => route('about').'#Info',
    __('Address') => route('about').'#Address',
    __('Soon') => route('about').'#Soon',],
])

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="h-100 carousel-inner">
        <div @style(['display: block', 'max-width: 100%', 'height: auto'])  class="carousel-item active">
            <img class="d-block w-100" src="{{asset('img/slider/first.png')}}" alt="First slide">
        </div>
        <div @style(['display: block', 'max-width: 100%', 'height: auto'])  class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/slider/second.png')}}" alt="Second slide">
        </div>
        <div @style(['display: block', 'max-width: 100%', 'height: auto'])  class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/slider/thirth.png')}}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="sr-only">Next</span>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<div class="h-100" style="background-color: #0f5132" id="About">

</div>

<div class="h-100" style="background-color: #0a3622" id="Info">

</div>

<div class="h-100" style="background-color: #0a58ca" id="Address">

</div>
