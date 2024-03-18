<?php

namespace App\Console\Commands;

use App\Mail\EventSignupConfirmation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mail';

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
        Mail::to('dennis@mooore.nl')->send(new EventSignupConfirmation());
    }
}
