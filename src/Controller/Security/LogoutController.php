<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LogoutController
 * @package App\Controller\Security
 */
class LogoutController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        if ($this->get('security.token_storage')->getToken()->getUser()) {
            $this->get('security.token_storage')->setToken(null);
            $this->addFlash('succes','Vous êtes déconnecté');
            return $this->redirectToRoute('home');
        }
    }
}