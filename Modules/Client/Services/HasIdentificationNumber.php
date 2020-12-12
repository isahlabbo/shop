<?php

namespace Modules\Client\Services;

trait HasIdentificationNumber
{
    
    public function generateIdentificationNumber()
    {
    	if($this->hasThisYearIdentification() && !empty($this->getYearAddressIdentificationNumbers())){
    		
    		// get the list of numbers in the address of this year
            $identifications = $this->getYearAddressIdentificationNumbers();
        	
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

    		$this->newYearAddressIdetification();
            
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

    public function newYearAddressIdetification()
    {
    	return $this->address->yearlyAddressClientIdentifications()->create(['year'=>date('Y')]);
    }

	public function hasThisYearIdentification()
	{
		$count = 0;
		foreach ($this->address->yearlyAddressClientIdentifications->where('year',date('Y')) as $key => $value) {
			$count ++;
		}
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getYearAddressIdentificationNumbers()
	{
		$identifications = [];
        
		foreach ($this->address->clients as $client) {
			$identifications[] = $client->CIN;
		}
        
		return $identifications;
	}

	
}