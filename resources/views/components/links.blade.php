<ul class="navbar-nav mr-auto">
    @foreach($links as $name => $link)
        <li class="nav-item">
            <a class="nav-link" href="{{ $link }}">{{ $name }}</a>
        </li>
    @endforeach
</ul>
