<?php

namespace AppBundle\Controller;

use AppBundle\Form\BoardType;
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
}
