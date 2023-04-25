<?php

namespace App\Jobs;

use App\Mail\MailAddClass;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AddClassJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $infoUser;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($infoUser)
    {
        $this->infoUser = $infoUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->infoUser['email'])->send(new MailAddClass($this->infoUser));
    }
}
