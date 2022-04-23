<?php

declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Twig\HomeServiceInformationsRunTime;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new twigFunction(
                'homeServiceInformations', [HomeServiceInformationsRunTime::class, 'homeServiceInformations'])
        ];
    }
}
