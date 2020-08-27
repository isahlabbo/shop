<?php
namespace Modules\Apparent\Services;

use Modules\Apparent\Entities\Lga;

class AddressHandle
{

	public $address;
	private $lga;
	private $town;
	private $area;

    public function __construct(array $data)
    {
    	$this->data = $data;
    	$this->lga = Lga::find($this->data['lga']);
    	$this->getAddressInfo();
    }

    public function getTownInfo()
    {
    	$this->town = $this->lga->towns()->firstOrCreate(['name'=>$this->data['town']]);
    }

    public function getAreaInfo()
    {
    	$this->getTownInfo();
    	$this->area = $this->town->areas()->firstOrCreate(['name'=>$this->data['area']]);
    }

    public function getAddressInfo()
    {
    	$this->getAreaInfo();
    	$this->address = $this->area->addresses()->firstOrCreate(['name'=>$this->data['address']]);
    }
}