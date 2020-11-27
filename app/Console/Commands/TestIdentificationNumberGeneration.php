<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Client\Entities\Client;

class TestIdentificationNumberGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewmycloth:client-identification-number-generate';

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
        foreach(Client::all() as $client){
           
            $client->update([
                'CID'=>$client->generateIdentificationNumber(),
                'yearly_address_client_identification_id'=>$client->getIdentification()->id,
            ]);
        }
    }
}
