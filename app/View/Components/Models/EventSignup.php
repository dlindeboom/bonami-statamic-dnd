<?php

declare(strict_types=1);

namespace App\View\Components\Models;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventSignup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $eventId)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.models.event-signup');
    }
}
