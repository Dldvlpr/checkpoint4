<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/search', name: 'search_')]
class SearchController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        return $this->render('search/index.html.twig', [
        ]);
    }

    #[Route('/search/{playerName}', name: 'player')]
    public function player(CallApiService $callApiService, string $playerName): Response
    {
        $stat = $callApiService->getsummonerStat($playerName);



        return $this->render('search/searchBar.html.twig', [
            'stat' => $stat
        ]);
    }
}



