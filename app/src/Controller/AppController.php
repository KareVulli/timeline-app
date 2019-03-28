<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AppController extends AbstractController
{
    /**
     * @Route(
     *      "/{vueRouting}",
     *      requirements={
     *          "vueRouting"="^(?!api|_(profiler|wdt)).*"
     *      },
     *      name="index"
     * )
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig', []);
    }
}
