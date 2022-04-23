<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Enum\Service as ServiceEnum;
use App\Service\Service\Service;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

class HomeController extends AbstractController
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    #[Route('/', name: 'home')]
    public function index(Environment $twig): Response
    {
        dd(ServiceEnum::cases());
        $servicesRowsTemplate = '';
        $i = 0;
        foreach(ServiceEnum::cases() as $service) {
            $i++;
            
            $servicesRowsTemplate .= $twig->render('home/services/services_rows_template.html.twig', $this->translate($service->name, $i));
        }

        return $this->render('home/home.html.twig', [
            //'services_rows_template' => $servicesRowsTemplate,
            'service_enum' => ServiceEnum::cases()
        ]);
    }

    private function translate(string $serviceToTranslate, $i): array
    {
        $imageAndTextPositions = $i%2 === 0 ?
            ['first_block' => 'text', 'second_block' => 'image'] : 
            ['first_block' => 'image', 'second_block' => 'text'];

        return [
            'title' => $this->translator->trans($serviceToTranslate . '.title', [], 'services'),
            'text' => $this->translator->trans($serviceToTranslate . '.text', [], 'services'),
            'image_pathname' => $this->translator->trans($serviceToTranslate . '.image_pathname', [], 'services'),
            'image_and_text_positions' => $imageAndTextPositions
        ];
    }
}
