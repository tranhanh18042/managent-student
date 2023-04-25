<?php

namespace App\Console\Commands;

use App\Mail\SendMailWeek;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use DateTime;
use Illuminate\Console\Command;

class SendMailWeekly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userSubject = UserSubject::get();

        foreach ($userSubject as $userSubject) {
            $today = new DateTime(date('Y-m-d'));
            $endDate = new DateTime(date('Y-m-d', Subject::find($userSubject->subject_id)->end_date()));
            $startDate = new DateTime(date('Y-m-d', Subject::find($userSubject->subject_id)->start_dat()));

            if ($endDate < $today && $startDate > $today) {
                $data = [
                    'name' => User::find($userSubject->user_id)->id(),
                    'email' => User::find($userSubject->user_id)->email(),
                    'subject_name' => Subject::find($userSubject->subject_id)->subject_name(),
                    'score_process' => $userSubject->score_process,
                    'score_test' => $userSubject->score_test,
                ];
                SendMailWeek::dispath($data);
            }else{
                continue;
            }
        }
    }
}
