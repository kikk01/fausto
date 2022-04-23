<?php

declare(strict_types=1);

namespace App\Twig;

use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\RuntimeExtensionInterface;

class HomeServiceInformationsRunTime implements RuntimeExtensionInterface
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function homeServiceInformations(string $service)
    {
        return [
            'title' => $this->translator->trans($service . '.title', [], 'services'),
            'subtitle' => $this->translator->trans($service . '.subtitle', [], 'services'),
            'image_pathname' => $this->translator->trans($service . '.image_pathname', [], 'services'),
            'first_paragraph' => $this->translator->trans($service . '.first_paragraph', [], 'services'),
            'second_paragraph' => $this->translator->trans($service . '.second_paragraph', [], 'services'),
        ];
    }
    
}
