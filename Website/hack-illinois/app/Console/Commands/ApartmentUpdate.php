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
               foreach ($user->chores as $chore) {
                   if($chore->finished_today == "Yes"){
                        if($key+1 >= count($users)){
                            $chore->finished_today = "No";
                            $chore->assigned_user_id = $users[0]->id;
                            $chore->save();
                        }else{
                            $chore->finished_today = "No";
                            $chore->assigned_user_id = $users[$key+1]->id;
                            $chore->save();
                        }
                   }
               }
            }
        }
    }
}