<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

	    return $this->render('BloggerBlogBundle:Page:show.html.twig', array(
	        'blog'      => $blog,
	        'comments'  => $comments
        ));
    }
}