<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Authentification;
use App\Form\RegistrationType;

class NeoccurHomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'NeoccurHomeController',
        ]);
    }

    /**
     * @Route("/signup", name="signup")
     */

    public function signup()
    {

        $user = new Authentification();

        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('home/signup.html.twig', [
            'controller_name' => 'NeoccurHomeController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */

    public function login()
    {
        return $this->render('home/login.html.twig', [
            'controller_name' => 'NeoccurHomeController',
        ]);
    }
}