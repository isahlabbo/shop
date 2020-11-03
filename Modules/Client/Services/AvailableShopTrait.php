<?php
namespace Modules\Client\Services;

trait AvailableShopTrait
{

    public function areaShops()
    {
        return $this->address->area->shops(10);
    }

    public function townShops()
    {
        return $this->address->area->town->shops(2);
    }

    public function localGovernmentShops()
    {
        return $this->address->area->town->lga->shops(1);
        
    }

    public function stateShops()
    {
        return $this->address->area->town->lga->state->shops(1);
    }

}