<?php

declare(strict_types=1);

namespace App\Scopes;

use Statamic\Query\Scopes\Scope;

class EventPassed extends Scope
{
    /**
     * Apply the scope.
     *
     * @param \Statamic\Query\Builder $query
     * @param array $values
     * @return void
     */
    public function apply($query, $values)
    {
        $query->whereNotNull('event_date')->where('event_date', '<=', now());
    }
}
