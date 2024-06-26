<?php

declare(strict_types=1);

namespace App\View\Components\Alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $message)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.error');
    }
}
