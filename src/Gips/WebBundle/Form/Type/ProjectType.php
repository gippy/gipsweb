<?php

namespace Gips\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', null, array('label' => 'Section name'));
		$builder->add('lang', null, array('label' => 'Language'));
		$builder->add('content', new HTMLEditorType());
		$builder->add('save', 'submit');
	}

	public function getName()
	{
		return 'project';
	}
}