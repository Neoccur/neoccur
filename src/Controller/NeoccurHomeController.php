<?php

namespace App\Controller;

use App\Form\RegistrationType;
use App\Entity\Authentification;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function signup(Request $request, ObjectManager $manager)
    {

        $user = new Authentification();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($user);
            $manager->flush();
        };

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