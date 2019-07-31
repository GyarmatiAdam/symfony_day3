<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    /**
    * @Route("/insertUser")
    */
    public function insertAction()
    {
    $user = new Users;
    $user->setFirstName('Adam');
    $user->setLastName('Gyarmati');
    $user->setUsername('agyarmati');
    $user->setPass('12369874');
    // $user->setDob('');
    $doct = $this->getDoctrine()->getManager();
    $doct->persist($user);
    $doct->flush();
    return new Response('New User inserted with id ' . $user->getId());
    }
    
    
    /**
    * @Route("/insert")
    */
    public function displayAction()
    {
    $user = $this->getDoctrine()
    ->getRepository('AppBundle:Users')->findAll();

    return $this->render('pages/insert.html.twig', array('test' => $user));
    }

    /**
    * @Route("/example/update/{id}")
    */
    public function updateAction($id)
    {
    $doct = $this->getDoctrine()->getManager();
    $stud = $doct->getRepository('AppBundle:Example_class')->find($id);
    if (!$stud) {
    throw $this->createNotFoundException(
    'No student found for id '.$id
    );
    }
    $stud->setAddress('Herklotzgasse 21, Wien');
    $doct->flush();
    return new Response('Changes updated!');
    }
}
