<?php

namespace My\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontendBundle:Song')->findAll();
        return array('entities' => $entities);
    }

    /**
     * @Route("/{id}.html", name="song_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('MyFrontendBundle:Song')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Podana strona nie istnieje!');
        }

        return array('entity' => $entity);
    }

}
