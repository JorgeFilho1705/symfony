<?php

namespace Arca\EmpresaBundle\Controller;

use Arca\EmpresaBundle\Entity\Empresa;
use Arca\EmpresaBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


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
        $search = new Empresa();
        $search->setTitulo($search->getTitulo());

        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $empresas = $em->getRepository('EmpresaBundle:Empresa')
                           ->findSearch($search->getTitulo());
        }else{
            $empresas = $em->getRepository('EmpresaBundle:Empresa')->findAll();
        }

        return $this->render('empresa/index.html.twig', array(
            'form'     => $form->createView(),
            'empresas' => $empresas,
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
        $data = array('saida' => $this->showTable($empresa));
        $response = new JsonResponse($data);

        return $response;
    }

    /**
     * Displays a form to edit an existing empresa entity.
     *
     */
    public function editAction(Request $request, Empresa $empresa)
    {
        $editForm = $this->createForm('Arca\EmpresaBundle\Form\EmpresaType', $empresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->render('close.html.twig', array(
                'tela' => 'Empresa',
                'rota' => 'empresa_index'
            ));
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

    private function showTable(Empresa $empresa){
        $html = '<table style="width: 100%; font-size: 12px;">';
        $html .= '  <tr>';
        $html .= '    <td width="50px"><b>ID</b></td>';
        $html .= '    <td>'.$empresa->getId().'</td>';
        $html .= '  </tr>';
        $html .= '  <tr>';
        $html .= '    <td><b>Titulo</b></td>';
        $html .= '    <td>'.$empresa->getTitulo().'</td>';
        $html .= '  </tr>';
        $html .= '  <tr>';
        $html .= '    <td><b>Telefone</b></td>';
        $html .= '    <td>'.$empresa->getTelefone().'</td>';
        $html .= '  </tr>';
        $html .= '  <tr>';
        $html .= '    <td><b>Endereço</b></td>';
        $html .= '    <td>'.$empresa->getEndereco().' - '.$empresa->getCidade().'/'.$empresa->getEstado().' CEP: '.$empresa->getCep().'</td>';
        $html .= '  </tr>';
        $html .= '  <tr>';
        $html .= '    <td><b>Descrição</b></td>';
        $html .= '    <td>'.$empresa->getDescricao().'</td>';
        $html .= '  </tr>';
        $html .= '  <tr>';
        $html .= '    <td><b>Categoria</b></td>';
        $html .= '    <td></td>';
        $html .= '  </tr>';
        $html .= ' </table>';
        return $html;
    }

}
