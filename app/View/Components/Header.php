<?php

namespace App\View\Components;

use App\Enums\UserRole;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $links = [],
    )
    {
        if (empty($links)) {
            $this->defaultLinks();
        }
    }

    private function defaultLinks(): void
    {
        if (Auth::user()) {
            switch (Auth::user()->getRole()) {
                case UserRole::Admin:
                    $this->links = [
                        __('Statements') => route('admin.statements'),
                        __('Vehicles') => route('admin.vehicles'),
                        __('Used Consumables') => route('admin.uconsumables'),
                        __('Used Services') => route('admin.uservices'),
                        __('Users') => route('admin.users'),
                        __('Models') => route('admin.models'),
                        __('Marks') => route('admin.marks'),
                        __('Stuff') => route('admin.stuff'),
                        __('Workshops') => route('admin.workshops'),
                        __('Services') => route('admin.services'),
                        __('Consumables') => route('admin.consumables'),
                    ];
                    break;

                case UserRole::Operator:
                    $this->links = [
                        __('Statements') => route('admin.statements'),
                        __('Vehicles') => route('admin.vehicles'),
                        __('Used Consumables') => route('admin.uconsumables'),
                        __('Used Services') => route('admin.uservices'),
                    ];
                    break;
            }
        } else {
            $this->links = [
                __('About Us') => route('about') . '#about',
                __('Info') => route('about') . '#info',
                __('Addresses') => route('about') . '#address',
                __('Soon') => route('about') . '#soon',
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public
    function render(): View|Closure|string
    {
        return view('components.header');
    }
}
