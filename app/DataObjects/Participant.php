<?php

declare(strict_types=1);

namespace App\DataObjects;

class Participant extends AbstractDataObject
{
    // Statamic forces a title to be present for entries. So we use the email as the title.
    // This allows the admin to see the email of the participant in the control panel.
    // Which is just more user-friendly in my eyes. This constant keeps the code DRY.
    public const EMAIL = 'title';
    public const NAME = 'name';
    public const ABOUT_YOU = 'about_you';

    public function toArray():array
    {
        return [
            self::EMAIL => $this->getEmail(),
            self::NAME => ucfirst($this->get('name')),
            self::ABOUT_YOU => $this->get('about_you'),
        ];
    }

    public function getEmail(): string
    {
        return $this->get('email');
    }
}
