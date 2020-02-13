<?php

namespace App\Controller;

use App\Entity\Ijsrecept;
use App\Entity\User;
use App\Form\IjsreceptType;
use App\Form\RegistrationType;
use App\Repository\IjsreceptRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepageAction()
    {
        return $this->render('user/index.html.twig');
    }

    /**
     * @Route("/receptenoverzicht", name="receptoverzicht")
     */
    public function ReceptOverzichtShow(IjsreceptRepository $ijsreceptRepository)
    {
        return $this->render('user/receptenoverzicht.html.twig', [
            'ijsrecept' => $ijsreceptRepository->findAll(),
        ]);
    }

//    /**
//     * @Route("/Recepttoevoegen", name="recepttoevoegen")
//     */
//    public function RecepttoevoegenAction(Request $request)
//    {
//        $ijsrecept = new Ijsrecept();
//
//        $form = $this->createForm(IjsreceptType::class. $ijsrecept);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($ijsrecept);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('receptoverzicht');
//        }
//        return $this->render('user/recepttoevoegen.html.twig');
//    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('home');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function registrationAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             $form->getData();
            $user = $form->getData();
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));


             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($user);
             $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('user/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
