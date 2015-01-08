<?php

// src/Acme/ArticleBundle/Controller/ArticleController.php

namespace Acme\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function recentArticlesAction($max = 3)
    {
        // un appel en base de données ou n'importe quoi qui retourne les "$max" plus récents articles
        $articles = 'Blabla';

        return $this->render('AcmeArticleBundle:Article:recentList.html.twig', array('articles' => $articles));
    }
}