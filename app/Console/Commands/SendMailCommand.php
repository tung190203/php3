<?php

namespace App\Console\Commands;

use App\Mail\Email;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:emails {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to user';
    public function __construct(){
        parent:: __construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));
        Mail::to($user)->send(new Email($user));
    }
}
