<?php

namespace App\Controller;


use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\User;
use App\Entity\Role;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/add", name="add-user")
     */
    public function new(){

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        return $this->render('user/index.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function demo(){
  //      $em = $this->getDoctrine()->getManager();
//        $date = new \DateTime();
//
//        $role = new Role();
//        $role->setActive(1);
//        $role->setName('admin');
//        $em->persist($role);
//
//        $user = new User();
//        $user->setActive(1);
//        $user->setBirthday($date);
//        $user->setCreatedDate($date);
//        $user->setEmail('ftz@aim.com');
//        $user->setPassword("azerty");
//        $user->setPseudo('ftz-1');
//        $user->setRole($role);
//        $user->setStatus(null);
//
//        $em->persist($user);
//        $em->flush();
//
//        return $this->render('user/index.html.twig', [
//            'user_name' => $user->getPseudo(),
//        ]);
    }
}
