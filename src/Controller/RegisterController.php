<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        //instanciation de la classe User
        $user = new User();

        //instanciation du formulaire avec la méthode creatForm
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        $entityManager = $doctrine->getManager();

        // tell Doctrine you want to (eventually) save the Product (no queries yet)


        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            $user = $form->getData();
            $plaintextPassword = $user->getPassword();

            // hash the password (based on the security.yaml config for the $user class)
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);

            //send the data to database
            $entityManager->persist($user);
            $entityManager->flush();

            // ... perform some action, such as saving the task to the database
            return $this->redirectToRoute('app_folio');
        }

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createview()
        ]);
    }
}
