<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Person;


class CheckForBirthdays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cwb:birthdayCheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //

        $people = Person::whereDay('birthday', now()->addDays(3)->format('d'))
            ->whereMonth('birthday', now()->addDays(3)->format('m'))
            ->get();




    }
}
