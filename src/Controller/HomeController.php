<?php

namespace App\Controller;

use App\Compoment\HttpFoundation\Request;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    
     #[Route("/", name:"app_home")]

    public function index(ManagerRegistry $mr): Response
    {
        $allPost=$mr->getRepository(Post::class)->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController','allPost'=>$allPost
        ]);
    }   
}
