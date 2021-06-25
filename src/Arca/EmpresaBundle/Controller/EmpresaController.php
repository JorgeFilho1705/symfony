<?php

namespace Arca\EmpresaBundle\Controller;

use Arca\EmpresaBundle\Entity\Empresa;
use Arca\EmpresaBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;



/**
 * Empresa controller.
 *
 */
class EmpresaController extends Controller
{
    /**
     * Lists all empresa entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $empresas = $em->getRepository('EmpresaBundle:Empresa')->findAll();
        $listEmpresas = $this->renderView('empresa/lista-empresa.html.twig', array(
                                               'empresas' => $empresas));

        return $this->render('empresa/index.html.twig', array(
            'Listempresas' => $listEmpresas,
        ));
    }

    /**
     * Creates a new empresa entity.
     *
     */
    public function newAction(Request $request)
    {
        $empresa = new Empresa();
        $form = $this->createForm('Arca\EmpresaBundle\Form\EmpresaType', $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            return $this->render('close.html.twig', array(
                'tela' => 'Empresa',
                'rota' => 'empresa_index'
            ));
        }

        return $this->render('empresa/new.html.twig', array(
            'empresa' => $empresa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empresa entity.
     *
     */
    public function showAction(Empresa $empresa)
    {
        $data = array('saida' => $this->renderView('empresa/show.html.twig', array(
                                 'empresa' => $empresa)
                                 )
                      );
        $response = new JsonResponse($data);
        return $response;
    }

    /**
     * Finds and displays a empresa entity.
     *
     */
    public function searchAction($search)
    {
        $repository = $this->getDoctrine()->getRepository(Empresa::class);
        $empresas = $repository->findSearch($search);
        $listEmpresas = $this->renderView('empresa/lista-empresa.html.twig', array(
                                               'empresas' => $empresas));

        $data = array('saida' => $listEmpresas);
        $response = new JsonResponse($data);
        return $response;
    }

    /**
     * Displays a form to edit an existing empresa entity.
     *
     */
    public function editAction(Request $request, Empresa $empresa)
    {
        $session = new Session();

        $editForm = $this->createForm('Arca\EmpresaBundle\Form\EmpresaType', $empresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $imagem = $empresa->getImagem();
            if($imagem != NULL) {
                $caminho = './images/empresa/';
                @unlink($caminho.$session->get('imagem'));
                $nome_imagem = time().'.jpg';
                $novaImagem = $caminho.$nome_imagem;
                move_uploaded_file($imagem, $novaImagem);
                $empresa->setImagem($nome_imagem);
            }else{
                $empresa->setImagem($session->get('imagem'));
            }

            $this->getDoctrine()->getManager()->flush();
            return $this->render('close.html.twig', array(
                'tela' => 'Empresa',
                'rota' => 'empresa_index'
            ));
            $session->set('imagem', NULL);
        }else{
            $session->set('imagem', $empresa->getImagem());
        }
        return $this->render('empresa/edit.html.twig', array(
            'empresa' => $empresa,
            'edit_form' => $editForm->createView()
        ));
    }

    /**
     * Deletes a empresa entity.
     *
     */
    public function deleteAction(Request $request, Empresa $empresa)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($empresa);
        $em->flush();
        return $this->redirectToRoute('empresa_index');
    }
}
