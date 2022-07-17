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


#[Route('/game', name: 'app_')]
class GameController extends AbstractController
{
    #[Route('/', name: 'game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    #[Route('/new', name: 'game_new')]
    public function edit(Request $request, FileUploader $fileUploader, GameRepository $gameRepository): Response
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

                return $this->redirectToRoute('app_game_new');
            }

            return $this->renderForm('game/new.html.twig', [
                'form' => $form,
            ]);
        }
    }


}
