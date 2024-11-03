<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('borrow:update-status', function () {
    $controller = new AdminController();
    $controller->updateLateStatus();
})->describe('Cập nhật trạng thái của bảng Borrow nếu Return_date đã qua');

Schedule::command('borrow:update-status')->daily();
