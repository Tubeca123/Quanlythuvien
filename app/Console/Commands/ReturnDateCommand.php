<?php

namespace App\Console\Commands;

use App\Models\Borrow;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReturnLate;

use Illuminate\Console\Command;

class ReturnDateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:return-date-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $borrows = Borrow::where('Status', 2)->where('Return_date', '<', now())->get();

        foreach ($borrows as $borrow) {
            $borrow->Status = 4;
            $borrow->save();

            $user = $borrow->user;
            $datelate = now();
            $detail = $borrow->details->map(function ($detail) {
                return $detail->book->Name ?? 'No book name';
            })->toArray();

            Mail::to($user->Email)->send(new SendReturnLate($user, $datelate, $detail));
        }
    }
}
