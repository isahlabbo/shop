<?php

namespace Modules\Client\Services;

trait HasIdentificationNumber
{
    protected $lga;

    public function generateIdentificationNumber()
    {
        $this->lga = $this->address->area->town->lga;

    	if($this->hasThisYearIdentification() && count($this->getYearLgaIdentificationNumbers()) > 0){
    		
    		// get the list of numbers in the address of this year
            $identifications = $this->getYearLgaIdentificationNumbers();
        	
        	// sort the numbers
            sort($identifications);

            // get the last number from the sorted list
            $lastNumber = last($identifications);

		    // add one to it as new number to give this person
            $newNumber = $lastNumber + 1;

    		// return the number
            return $newNumber;
    	}else{
    		// register the year identification session

    		$this->newYearLgaIdetification();
            
            // generate new number
            $newNumber = $this->generateNumber();

    		// return the number
    		return $newNumber;
    	}
    }

    public function generateNumber()
    {
        return substr(date('Y'), 2, 2)
        .$this->stateFormat($this->address->area->town->lga->state->id)
        .$this->lgaFormat($this->address->area->town->lga->id)
        .$this->gender->id.
        '001';
    }

    public function stateFormat($number)
    {
        $ext = '';
        if($number < 10){
            $ext = '0';
        }
        return $ext.$number;
    }
    public function lgaFormat($number)
    {
        $ext = '';
        if($number < 10){
            $ext = '00';
        }elseif ($number < 100) {
        	$ext = '0';
        }
        return $ext.$number;
    }

    public function newYearLgaIdetification()
    {
    	return $this->lga->yearlyLgaClientIdentifications()->firstOrCreate(['year'=>date('Y')]);
    }

	public function hasThisYearIdentification()
	{
		
		if(count($this->lga->yearlyLgaClientIdentifications->where('year',date('Y')))>0){
            return true;
        }

        return false;
	}

	public function getYearLgaIdentificationNumbers()
	{
		$identifications = [];

		foreach ($this->lga->yearlyLgaClientIdentifications->where('year',date('Y')) as $identification) {

            foreach ($identification->clients as $client) {

                $identifications[] = $client->CIN;
            }
		}
        
		return $identifications;
	}

	
}