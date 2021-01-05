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
    protected $signature = 'sewmycloth:update-client-info';

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
           
            $bar = $this->output->createProgressBar(count(Client::all()));

            $bar->setBarWidth(100);

            $bar->start();

            $client->update([
                'CIN'=>$client->generateIdentificationNumber(),
                'email'=>$client->generateIdentificationNumber().'@smc.com',
                'password'=>Hash::make($client->generateIdentificationNumber()),
                'yearly_lga_client_identification_id' => $client->address->area->town->lga->getIdentification()->id,
            ]);
            $bar->advance();
        }
        $bar->finish();
    }
}
