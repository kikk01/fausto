<?php 

declare(strict_types=1);

namespace App\Service\Service;

use App\Enum\Service as ServiceEnum;
use App\Service\Service\Service;

class ServiceTemplateConstructorService
{
    public function constructSection() 
    {

        foreach(ServiceEnum::cases() as $section) {
            $homeSectionTemplateConstructor = (new Service()
            );      
        }
    }
}
