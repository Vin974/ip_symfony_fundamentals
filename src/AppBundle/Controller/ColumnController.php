<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 23/10/2016
 * Time: 20:21
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Column;
use AppBundle\Form\ColumnType;
use AppBundle\Form\NewColumnType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ColumnController extends Controller
{

    /**
     * @Route("/column/{id}/edit", name="column_edit")
     * @Method({"GET", "POST"})
     *
     * @param Column $column
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Column $column, Request $request)
    {
        $form = $this->createForm(ColumnType::class, $column);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->get('doctrine.orm.entity_manager');
            $manager->persist($column);
            $manager->flush();

            return $this->redirectToRoute('boards_view', [
                'id' => $column->getBoard()->getId(),
            ]);
        }

        return $this->render('column/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/column/add", name="column_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(NewColumnType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Column $column */
            $column = $form->getData();

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($column);
            $em->flush();

            return $this->redirectToRoute('boards_view', [
                'id' => $column->getBoard()->getId(),
            ]);
        }
    }
}