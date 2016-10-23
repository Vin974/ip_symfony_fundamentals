<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Board;
use AppBundle\Entity\Column;
use AppBundle\Form\Type\BoardType;
use AppBundle\Form\Type\ColumnType;
use AppBundle\Form\Type\NewColumnType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BoardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $boards = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Board')->findAll();

        return $this->render('board/list.html.twig', [
            'boards' => $boards,
        ]);
    }

    /**
     * @Route("/boards/add", name="boards_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(BoardType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $board = $form->getData();

            $manager = $this->get('doctrine.orm.entity_manager');
            $manager->persist($board);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('board/add.html.twig', [
            'board_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/boards/{id}", name="boards_view", requirements={"id": "\d+"})
     *
     * @param Board $board
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(Board $board, Request $request)
    {
        $column = (new Column)->setBoard($board);

        $form = $this->createForm(NewColumnType::class, $column, [
            'action' => $this->generateUrl('column_add'),
        ]);

        return $this->render('board/view.html.twig', [
            'board' => $board,
            'form_add_column' => $form->createView(),
        ]);
    }
}
