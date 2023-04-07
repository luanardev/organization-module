<?php

namespace Lumis\Organization\Settings;

use Luanardev\Settings\Settings;

class Organization extends Settings
{
    public ?string $name;
    public ?string $acronym;
    public ?string $logo;
    public ?string $favicon;
    public ?string $contact_email;
    public ?string $contact_address;
    public ?string $contact_number;
    public ?string $city;
    public ?string $country;
    public ?string $website;
    public ?string $domain;

    public static function group(): string
    {
        return 'organization';
    }
}
