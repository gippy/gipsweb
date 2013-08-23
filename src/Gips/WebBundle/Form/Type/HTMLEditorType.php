<?php

namespace Gips\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class HTMLEditorType extends AbstractType {

	public function getParent() {
		return 'hidden';
	}

	public function getName() {
		return 'html_editor';
	}
}