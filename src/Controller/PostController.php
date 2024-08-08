<?php

// src/Controller/PostController.php
namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route("/post/{id}", name:"post_show")]
    public function show(int $id, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Le post n\'existe pas.');
        }

        $relPerso = $post->getPersos(); // Utilisez la méthode getPersos()

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'rel' => $relPerso,
        ]);
        }

    /**
     * @Route("/posts/export", name="posts_export", methods={"GET"})
     */
    
    public function exportToJson(PostRepository $postRepository, SerializerInterface $serializer): Response
    {
        // Récupérer tous les posts
        $posts = $postRepository->findAll();
        
        // Sérialiser les posts en JSON
        $jsonContent = $serializer->serialize($posts, 'json');

        // Créer une réponse JSON avec en-tête de téléchargement
        return new Response($jsonContent, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
            'Content-Disposition' => 'attachment; filename="posts.json"',
        ]);
    }
}

