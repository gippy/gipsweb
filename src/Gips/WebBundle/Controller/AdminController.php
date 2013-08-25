<?php

namespace Gips\WebBundle\Controller;

use Gips\WebBundle\Entity\CVSection;
use Gips\WebBundle\Form\Type\CVSectionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('GipsWebBundle:Admin:index.html.twig');
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

	/**
	 * @ParamConverter("section", class="GipsWebBundle:CVSection")
	 */
	public function removeSectionAction(CVSection $section){

	}
}
