<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/insert", name="insertpage")
     */
    public function insertAction(Request $request)
    {
        return $this->render('pages/insert.html.twig');
    }
}
