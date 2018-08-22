<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Controller\Security;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RegisterController
 * @package App\Controller\Security
 */
class RegisterController extends AbstractController
{
    /**
     * @param Request $request
     * @param UserService $userService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/register", name="security_register")
     */
    public function register(Request $request, UserService $userService)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        $form = $userService->registerUser($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Merci pour votre inscription !');
            return $this->redirectToRoute('home');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);

    }
}