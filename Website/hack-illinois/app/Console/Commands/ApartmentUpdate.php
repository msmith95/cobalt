<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Apartment;

class ApartmentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apartmentupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all apartments and chores';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $apartments = Apartment::all();
        foreach ($apartments as $apartment) {
            $users = $apartment->user;
            foreach ($users as $key => $user) {
               foreach ($user->chores()->due()->get() as $chore) {
                   if($chore->finished_today == "Yes"){
                       $chore->finished_today = "No";
                       $chore->assigned_user_id = $key+1 >= count($users) ? $users[0]->id : $users[$key+1]->id;
                       $this->computeDate($chore);
                       $chore->save();
//                        if($key+1 >= count($users)){
//                            $chore->finished_today = "No";
//                            $chore->assigned_user_id = $users[0]->id;
//                            $this->computeDate($chore);
//                            $chore->save();
//                        }else{
//                            $chore->finished_today = "No";
//                            $chore->assigned_user_id = $users[$key+1]->id;
//                            $this->computeDate($chore);
//                            $chore->save();
//                        }
                   }
               }
            }
        }
    }

    public function computeDate($chore){
        switch($chore->frequency){
            case "Daily": $chore->due_date = $chore->due_date->addDay(); break;
            case "Weekly": $chore->due_date = $chore->due_date->addWeek(); break;
            case "Bi-Weekly": $chore->due_date = $chore->due_date->addWeeks(2); break;
            case "Monthly": $chore->due_date = $chore->due_date->addMonth(); break;
            case "Bi-Monthly": $chore->due_date = $chore->due_date->addMonths(2); break;
        }
    }
}