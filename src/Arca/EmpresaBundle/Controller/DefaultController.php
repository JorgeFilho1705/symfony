<?php

namespace Arca\EmpresaBundle\Controller;

use Arca\EmpresaBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Arca\EmpresaBundle\Entity\Empresa;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends Controller
{

    /**
     *@Route("/", name="index")
     *@Template()
     */
    public function indexAction(Request $request)
    {
        $search = new Empresa();
        $search->setTitulo($search->getTitulo());

        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $empresas = $em->getRepository('EmpresaBundle:Empresa')->findAll();
        if ($form->isValid()) {
            //echo $search->getTitulo(); die;

        }

        return $this->render('index/index.html.twig', array(
            'form'     => $form->createView(),
            'empresas' => $empresas
        ));
    }

    /**
     *@Route("/search/{id}", name="search")
     *@Template()
     */
    public function searchAction(Empresa $empresa)
    {
        return $this->render('index/show.html.twig', array(
            'empresa' => $empresa
        ));
    }

}
