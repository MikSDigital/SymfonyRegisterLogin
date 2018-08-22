<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     */
    public function home()
    {

        return $this->render('home.html.twig');
    }
}