<?php

use Spatie\LaravelSettings\Migrations\SettingsBlueprint;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->migrator->inGroup('organization', function (SettingsBlueprint $blueprint): void {
            $blueprint->add('name', null);
            $blueprint->add('acronym', null);
            $blueprint->add('logo', null);
            $blueprint->add('favicon', null);
            $blueprint->add('contact_email', null);
            $blueprint->add('contact_address', null);
            $blueprint->add('contact_number', null);
            $blueprint->add('city', null);
            $blueprint->add('country', null);
            $blueprint->add('website', null);
            $blueprint->add('domain', null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->migrator->inGroup('organization', function (SettingsBlueprint $blueprint): void {
            $blueprint->delete('name');
            $blueprint->delete('acronym');
            $blueprint->delete('logo');
            $blueprint->delete('favicon');
            $blueprint->delete('contact_email');
            $blueprint->delete('contact_address');
            $blueprint->delete('contact_number');
            $blueprint->delete('city');
            $blueprint->delete('country');
            $blueprint->delete('website');
            $blueprint->delete('domain');

        });
    }

};
