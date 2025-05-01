<?php

use App\Models\ApiRequestLog;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('app:delete-stale-logs 30')->daily()->thenWithOutput(function (Stringable $output) {
    echo $output;
});