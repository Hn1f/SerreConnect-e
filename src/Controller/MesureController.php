<?php

namespace App\Controller;

use App\Entity\Controle;
use App\Form\ControleType;
use ContainerTl32efX\getUserRepositoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class MesureController extends AbstractController
{
    #[Route('/mesure', name: 'app_mesure')]
    public function index(ChartBuilderInterface $chartBuilder, Request $request): Response
    {
        $controle = new Controle();
        
        $form = $this->createForm(ControleType::class, $controle); 

        $chart = $chartBuilder->createChart(Chart::TYPE_LINE); 

        $chart->setData([
            'labels'=> ['21/02', '22/02', '23/02', '24/02', '25/02', '26/02',
                        '27/02','28/02'], 
            'datasets' => [
                [
                    'label' => 'Température Marseille', 
                    'backgroundColor' => '#00FF00',
                    'borderColor' => '#00FF00',
                    'data' => [24,23,21,20,18,16,14,19],
                ],
                [
                    'label' => 'Humiditée Marseille', 
                    'backgroundColor' => '#00BFFF',
                    'borderColor' => '#00BFFF',
                    'data' => [50,46,40,51,60,67,48,58],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 10,
                    'suggestedMax' => 25,
                ],
            ],
        ]);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);
        }

        return $this->render('mesure/index.html.twig', [
                'chart'=> $chart,
                'form'=> $form,
        ]);
    }
}
