<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Client\Entities\Client;
use Illuminate\Support\Facades\Hash;

class UpdateClientEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewmycloth:update-client-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        foreach(Client::cursor() as $client){
           
            $client->update([
                'CIN'=>$client->generateIdentificationNumber(),
                'email'=>$client->phone.'@sewmycloth.com',
                'password'=>Hash::make($client->password)
            ]);
        }
    }
}
