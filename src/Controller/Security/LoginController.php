<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class LoginController
 * @package App\Controller\Frontend
 */
class LoginController extends AbstractController
{
    /**
     * @param AuthenticationUtils $helper
     * @return Response
     * @Route("/connexion", name="security_login")
     */
    public function login(AuthenticationUtils $helper): Response
    {

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }
}