<?php

namespace Gips\WebBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Language
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=2)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="localized", type="string", length=255)
	 */
	private $localized;

	/**
	 * @ORM\OneToMany(targetEntity="CVSection", mappedBy="lang")
	 */
	private $sections;

	/**
	 * @ORM\OneToMany(targetEntity="Project", mappedBy="lang")
	 */
	private $projects;

	public function __construct()
	{
		$this->sections = new ArrayCollection();
		$this->projects = new ArrayCollection();
	}

	public function __toString(){
		return $this->getLocalized();
	}

	/**
	 * Set id
	 *
	 * @param string $id
	 * @return Language
	 */
	public function setId($id)
	{
		$this->name = $id;

		return $this;
	}

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Language
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set localized
     *
     * @param string $localized
     * @return Language
     */
    public function setLocalized($localized)
    {
        $this->localized = $localized;
    
        return $this;
    }

    /**
     * Get localized
     *
     * @return string 
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * Add sections
     *
     * @param CVSection $section
     * @return Language
     */
    public function addSection(CVSection $section)
    {
        $this->sections[] = $section;
    
        return $this;
    }

	/**
	 * Remove section
	 *
	 * @param CVSection $section
	 * @return Language
	 */
    public function removeSection(CVSection $section)
    {
        $this->sections->removeElement($section);

	    return $this;
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Add projects
     *
     * @param Project $project
     * @return Language
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;
    
        return $this;
    }

	/**
	 * Remove projects
	 *
	 * @param Project $project
	 * @return void Project $project
	 */
    public function removeProject(Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}