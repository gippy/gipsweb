<?php

namespace Gips\Webundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CVSectionType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name');
		$builder->add('content', null, array('widget' => 'html_editor_widget'));
		$builder->add('save', 'submit');
	}

	public function getName()
	{
		return 'cvsection';
	}
}