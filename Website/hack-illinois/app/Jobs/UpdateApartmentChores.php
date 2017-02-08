<?php

namespace App\Jobs;

use App\Apartment;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateApartmentChores extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $apartment;
    /**
     * Create a new job instance.
     *
     * @param Apartment $apartment
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = $this->apartment->users;
        $lookup = $users->pluck('id')->flip();
        $this->apartment->chores()->due()->get()->each(function($item, $key) use($users, $lookup){
            if($item->finished_today == "Yes"){
                $item->finished_today = "No";
                $item->assigned_user_id = $users[($lookup[$item->assigned_user_id] + 1) % $users->count()]->id;
                $this->computeDate($item);
                $item->save();
            }
        });
    }

    private function computeDate($chore){
        switch($chore->frequency){
            case "Daily": $chore->due_date = $chore->due_date->addDay(); break;
            case "Weekly": $chore->due_date = $chore->due_date->addWeek(); break;
            case "Bi-Weekly": $chore->due_date = $chore->due_date->addWeeks(2); break;
            case "Monthly": $chore->due_date = $chore->due_date->addMonth(); break;
            case "Bi-Monthly": $chore->due_date = $chore->due_date->addMonths(2); break;
        }
    }
}
