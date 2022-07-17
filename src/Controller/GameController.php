<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameFormType;
use App\Repository\GameRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/game', name: 'game_')]
class GameController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(GameRepository $gameRepository): Response
    {
        $games = $gameRepository->findAll();

        return $this->render('game/index.html.twig', [
            'games' => $games
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, FileUploader $fileUploader, GameRepository $gameRepository): Response
    {
        {
            $game = new Game();
            $form = $this->createForm(GameFormType::class, $game);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                /** @var UploadedFile $logoFile */
                $logoFile = $form->get('logo')->getData();
                if ($logoFile) {
                    $logoFileName = $fileUploader->upload($logoFile);
                    $game->setLogo($logoFileName);
                }

                $gameRepository->add($game, true);

                return $this->redirectToRoute('game_index');
            }

            return $this->renderForm('game/new.html.twig', [
                'form' => $form,
            ]);
        }
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FileUploader $fileUploader, GameRepository $gameRepository, int $id, Game $game): Response
    {
        

        $editForm = $this->createForm(GameFormType::class, $game);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $gameRepository->add($game, true);
        }

        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

}
