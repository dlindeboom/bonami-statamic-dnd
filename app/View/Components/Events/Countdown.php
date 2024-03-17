<?php

namespace App\View\Components\Events;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Statamic\Entries\Entry;

class Countdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Entry $nextEvent)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.events.countdown');
    }
}
