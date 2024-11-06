<?php

use App\Console\Commands\ReturnDateCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Artisan::command('app:return-date-command', function () {
    $controller = new ReturnDateCommand();
    $controller->handle();
})->describe('Oke');

app(Schedule::class)->command('app:return-date-command')->everyMinute();
