<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**  
 * @ORM\Entity 
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository") 
 */

class Event
{  
	/** 
	 * @ORM\Column(type="integer") 
	 *  @ORM\Id 
	 *  @ORM\GeneratedValue(strategy="AUTO") 
	 */
	protected $id;
	
	
	/** 
	 *  @ORM\Column(type="text") 
	 */
    protected $theme;
    
    /**
     *  @ORM\Column(type="text")
     */
    protected $venue;
    
    /**
     *  @ORM\Column(type="string", length=78)
     */
    protected $host;
    /**
     *  @ORM\Column(type="text")
     */
    protected $ministers;
    /**
     *  @ORM\Column(type="text")
     */
    protected $guest;
    /**
     *  @ORM\Column(type="integer")
     */
    protected $expired;
    
    
    /**
     *  @ORM\Column(type="date")
     */
    protected $date;
    /**
     *  @ORM\Column(type="time")
     */
    protected $time;
    
   

  //relatiionships   
  /** 
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="event") 
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id") 
   */
  	protected $category;

  	/**
  	 * @ORM\ManyToOne(targetEntity="Priority", inversedBy="event")
  	 * @ORM\JoinColumn(name="priority_id", referencedColumnName="id")
  	 */
  	protected $priority;
    
    

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
     * Set theme
     *
     * @param string $theme
     * @return Event
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set venue
     *
     * @param string $venue
     * @return Event
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue
     *
     * @return string 
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Event
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set ministers
     *
     * @param string $ministers
     * @return Event
     */
    public function setMinisters($ministers)
    {
        $this->ministers = $ministers;

        return $this;
    }

    /**
     * Get ministers
     *
     * @return string 
     */
    public function getMinisters()
    {
        return $this->ministers;
    }

    /**
     * Set guest
     *
     * @param string $guest
     * @return Event
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guest
     *
     * @return string 
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * Set expired
     *
     * @param integer $expired
     * @return Event
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return integer 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Event
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Event
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set priority
     *
     * @param \AppBundle\Entity\priority $priority
     * @return Event
     */
    public function setPriority(\AppBundle\Entity\priority $priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return \AppBundle\Entity\priority 
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
