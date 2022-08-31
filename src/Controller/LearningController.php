<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;


class LearningController extends AbstractController
{

    #[Route('/learning', name: 'app_learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/about-me', name: 'about-me') ]
    public function aboutMe(): Response
    {
        return $this->render('learning/example.html.twig', [
            'name' => 'beCode',
        ]);
    }

    #[Route('/', name: 'show-my-name') ]
    public function showMyName(Request $request): Response
    {   
        $name = $request->getSession()->get('name');

        return $this->render('learning/show-my-name.html.twig', [
            'name' => $testName,
        ]);
    }

    #[Route('/change-my-name', name: 'change-my-name') ]
    public function changeMyName(Request $request): RedirectResponse 
    {
        $newName = $request->request->get('newName');

        $request->getSession()->set('name', $newName);

        return $this->redirectToRoute('show-my-name');

    }
}
