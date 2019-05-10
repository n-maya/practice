<?php

namespace App\Console\Commands;

use App\Remind;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRemindMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_remind_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'リマインドメールを送ります';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('start');
        $reminds = Remind::where('send_at', Carbon::now()->format('Y-m-d H:i:00'))->get();
        foreach ($reminds as $remind) {
            Mail::raw($remind->body . Carbon::now()->format('Y-m-d H:i:00'), function ($m) use($remind) {
                $m->from('hello@app.com', 'Your Application');
                $m->to($remind->email)->subject('We Reminder. You recall.');
            });
        }
        $this->info(Carbon::now()->format('Y-m-d H:m:00'));
        $this->info('Complete');

    }
}
