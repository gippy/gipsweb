<?php

namespace Gips\WebBundle\Controller;

use Gips\WebBundle\Entity\CVSection;
use Gips\WebBundle\Form\Type\CVSectionType;
use Gips\WebBundle\Entity\Project;
use Gips\WebBundle\Form\Type\ProjectType;
use Gips\WebBundle\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminController extends Controller
{
	/**
	 * @ParamConverter("language", class="GipsWebBundle:Language")
	 */
    public function indexAction(Language $language) {
	    $projects = $language->getProjects();
        return $this->render('GipsWebBundle:Admin:index.html.twig', array(
	        'projects' => $projects
        ));
    }

	public function addSectionAction(Request $request){
		$section = new CVSection();
		$form = $this->createForm(new CVSectionType(), $section, array(
			'action' => $this->generateUrl('gips_web_add_section_submit'),
		));

		$form->handleRequest($request);

		return $this->render('GipsWebBundle:Admin:add_section.html.twig', array(
			'form' => $form->createView()
		));
	}

	public function addSectionSubmitAction(Request $request){
		$section = new CVSection();
		$form = $this->createForm(new CVSectionType(), $section, array(
			  'action' => $this->generateUrl('gips_web_add_section_submit'),
		 ));
		$form->handleRequest($request);

		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($section);
			$em->flush();

			$this->get('session')->getFlashBag()->add(
				'notice',
				'Your new website section was added!'
			);

			return $this->redirect($this->generateUrl('gips_web_edit_section', array(
				'id' => $section->getId()
			)));
		}

		return $this->redirect($this->generateUrl('gips_web_add_section'));
	}

	/**
	 * @ParamConverter("section", class="GipsWebBundle:CVSection")
	 */
	public function editSectionAction(CVSection $section){
		$form = $this->createForm(new CVSectionType(), $section, array(
			'action' => $this->generateUrl('gips_web_edit_section_submit', array(
				'id' => $section->getId()
			)),
		));

		return $this->render('GipsWebBundle:Admin:edit_section.html.twig', array(
			'form' => $form->createView()
		));
	}

	/**
	 * @ParamConverter("section", class="GipsWebBundle:CVSection")
	 */
	public function editSectionSubmitAction(CVSection $section, Request $request){
		$form = $this->createForm(new CVSectionType(), $section, array(
			'action' => $this->generateUrl('gips_web_edit_section_submit', array(
				'id' => $section->getId()
			)),
		));
		$form->handleRequest($request);

		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($section);
			$em->flush();

			$this->get('session')->getFlashBag()->add(
				'notice',
				'Your website section was updated!'
			);

			return $this->redirect($this->generateUrl('gips_web_edit_section', array(
				'id' => $section->getId()
			)));
		}

		return $this->redirect($this->generateUrl('gips_web_edit_section', array(
			'id' => $section->getId()
		)));
	}

	public function addProjectAction(Request $request){
		$project = new Project();
		$form = $this->createForm(new CVSectionType(), $project, array(
			'action' => $this->generateUrl('gips_web_add_project_submit'),
		));

		$form->handleRequest($request);

		return $this->render('GipsWebBundle:Admin:add_project.html.twig', array(
			'form' => $form->createView()
		));
	}

	public function addProjectSubmitAction(Request $request){
		$project = new Project();
		$form = $this->createForm(new CVSectionType(), $project, array(
			'action' => $this->generateUrl('gips_web_add_project_submit'),
		));
		$form->handleRequest($request);

		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($project);
			$em->flush();

			$this->get('session')->getFlashBag()->add(
				'notice',
				'Your new project was added!'
			);

			return $this->redirect($this->generateUrl('gips_web_edit_project', array(
				'id' => $project->getId()
			)));
		}

		return $this->redirect($this->generateUrl('gips_web_add_project'));
	}

	/**
	 * @ParamConverter("project", class="GipsWebBundle:Project")
	 */
	public function editProjectAction(Project $project){
		$form = $this->createForm(new ProjectType(), $project, array(
			'action' => $this->generateUrl('gips_web_edit_project_submit', array(
				'id' => $project->getId()
			)),
		));

		return $this->render('GipsWebBundle:Admin:edit_project.html.twig', array(
			'form' => $form->createView()
		));
	}

	/**
	 * @ParamConverter("project", class="GipsWebBundle:Project")
	 */
	public function editProjectSubmitAction(Project $project, Request $request){
		$form = $this->createForm(new ProjectType(), $project, array(
			'action' => $this->generateUrl('gips_web_edit_project_submit', array(
				'id' => $project->getId()
			)),
		));
		$form->handleRequest($request);

		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($project);
			$em->flush();

			$this->get('session')->getFlashBag()->add(
				'notice',
				'Your website section was updated!'
			);

			return $this->redirect($this->generateUrl('gips_web_edit_project', array(
				'id' => $project->getId()
			)));
		}

		return $this->redirect($this->generateUrl('gips_web_edit_project', array(
			'id' => $project->getId()
		)));
	}
}
