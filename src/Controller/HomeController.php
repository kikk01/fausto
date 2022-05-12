<?php

namespace App\Controller;

use App\Enum\HomeTemplateServiceElement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Enum\Service as ServiceEnum;
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
        $servicesTemplate = '';
        
        for($i=0;$i<count(ServiceEnum::cases());$i++) {
            $service = ServiceEnum::cases()[$i]->name;

            foreach (HomeTemplateServiceElement::cases() as $element) {
                $translations[$element->name] = $this->translator->trans($service . "." . $element->name, [], 'services');
            }

            
            $servicesTemplate .= ($i%2) ? 
                $this->renderView('home/services/display_text_right.html.twig', $translations) :
                $this->renderView('home/services/display_text_left.html.twig', $translations);
        }

        return $this->render('home/home.html.twig', ['services_template' => $servicesTemplate]);
    }
}
