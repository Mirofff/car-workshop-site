<a {{ $attributes->class([
        "nav-link",
        "d-flex",
        "align-items-center",
        "gap-2",
        "aria-current='page'",
    ])
}}>
    {{ $slot }}
</a>