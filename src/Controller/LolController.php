<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\LolProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LolController extends AbstractController
{
    #[Route('/lol/{user}', name: 'app_lol')]
    public function syncDataPlayer(User $user, LolProfileRepository $lolProfileRepository): Response
    {



        $this->redirectToRoute('search_player');
    }
}
