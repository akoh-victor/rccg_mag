<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**  
 * @ORM\Entity 
 * @ORM\Table(name="priority")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriorityRepository") 
 */

class Priority
{  
	/** 
	 * @ORM\Column(type="integer") 
	 *  @ORM\Id 
	 *  @ORM\GeneratedValue(strategy="AUTO") 
	 */
	protected $id;
	/** 
	 *  @ORM\Column(type="string", length=50)
	 */
    protected $Name;
    /**
     *  @ORM\Column(type="integer")
     */
    protected $level;

    
    
    /** 
     *  @ORM\OneToMany(targetEntity="News", mappedBy="priority") 
     *  @ORM\OneToMany(targetEntity="Event", mappedBy="priority")
     */
     protected $event;
     protected $news;
     public function __construct() {
   	 $this->news = new ArrayCollection();
   	 $this->event = new ArrayCollection();
    }
    
   
    
    


   


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return Priority
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Add event
     *
     * @param \AppBundle\Entity\News $event
     * @return Priority
     */
    public function addEvent(\AppBundle\Entity\News $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \AppBundle\Entity\News $event
     */
    public function removeEvent(\AppBundle\Entity\News $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Priority
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }
}
