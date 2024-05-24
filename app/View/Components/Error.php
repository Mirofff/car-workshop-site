<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ViewErrorBag $errors,
        public string       $alertType = 'info',
    ) {
    }

    public function shouldRender(): bool
    {
        return $this->errors->any();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error');
    }
}
