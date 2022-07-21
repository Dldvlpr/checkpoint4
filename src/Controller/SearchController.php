<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/search', name: 'search_')]
class SearchController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $playerName = ['message' => 'Summoner name'];
        $form = $this->createFormBuilder($playerName)
            ->add('playerName', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playerName = $form->getData();
            return $this->redirectToRoute('search_player',
                $playerName
                );
        }
        return $this->renderForm('search/index.html.twig', [
            'form' => $form,]);
    }



#[
Route('/search/{playerName}', name: 'player', methods: ['GET', 'POST'])]
    public function player(CallApiService $callApiService, string $playerName): Response
{
    $stat = $callApiService->getsummonerStat($playerName);


    return $this->render('search/searchBar.html.twig', [
        'stat' => $stat
    ]);
}
}



