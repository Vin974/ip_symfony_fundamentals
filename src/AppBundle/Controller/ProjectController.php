<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/projects/add", name="projects_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(ProjectType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $project = $form->getData();

            $manager = $this->get('doctrine.orm.entity_manager');
            $manager->persist($project);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('project/add.html.twig', [
            'project_form' => $form->createView(),
        ]);
    }
}