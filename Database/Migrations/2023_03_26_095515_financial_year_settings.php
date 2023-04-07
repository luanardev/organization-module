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
        $this->migrator->inGroup('financialyear', function (SettingsBlueprint $blueprint): void {
            $blueprint->add('start_date', null);
            $blueprint->add('start_month', null);
            $blueprint->add('start_year', null);
            $blueprint->add('end_date', null);
            $blueprint->add('end_month', null);
            $blueprint->add('end_year', null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->migrator->inGroup('financialyear', function (SettingsBlueprint $blueprint): void {
            $blueprint->delete('start_date', null);
            $blueprint->delete('start_month', null);
            $blueprint->delete('start_year', null);
            $blueprint->delete('end_date', null);
            $blueprint->delete('end_month', null);
            $blueprint->delete('end_year', null);

        });
    }
};
