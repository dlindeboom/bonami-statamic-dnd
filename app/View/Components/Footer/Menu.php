<?php

declare(strict_types=1);

namespace App\View\Components\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $street = "",
        public string $city = "",
        public string $zip = "",
        public string $phone = "",
        public string $logoUrl = ""
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer.menu');
    }
}
