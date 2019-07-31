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
    * @Route("/insert")
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
    * @Route("/users")
    */
    public function displayAction()
    {
    $user = $this->getDoctrine()
    ->getRepository('AppBundle:Users')->findAll();

    return $this->render('pages/insert.html.twig', array('test' => $user));
    }

    /**
    * @Route("/update/{id}")
    */
    public function updateAction($id)
    {
    $doct = $this->getDoctrine()->getManager();
    $user = $doct->getRepository('AppBundle:Users')->find($id);
    if (!$user) {
    throw $this->createNotFoundException(
    'No user found for id '.$id
    );
    }
    $user->setFirstName('John');
    $user->setLastName('Doe');
    $user->setUsername('someone');
    $doct->flush();
    return new Response('Changes updated!');
    }

    /**
    * @Route("/delete/{id}")
    */
    public function deleteAction($id)
    {
    $doct = $this->getDoctrine()->getManager();
    $user = $doct->getRepository('AppBundle:Users')->find($id);
    if (!$user) {
    throw $this->createNotFoundException(
    'No userent found for id '.$id
    );
    }
    $doct->remove($user);
    $doct->flush();
    return new Response('Record deleted!');
    }
}
