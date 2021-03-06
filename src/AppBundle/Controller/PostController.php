<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/insert/post", name="insert_post")
     */
    public function insertPost()
    {	
	$post = new Post();
        $post->setTitulo('Top Framework PHP 2017');
        $post->setContenido('Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. ');
        $post->setAutor('Lalo Landa');
        $post->setFecha(new \DateTime('2017-05-01'));

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);

        $em->flush();

        return new Response('Se inserto nueva entrada con ID:'.$post->getId());
    }
}
