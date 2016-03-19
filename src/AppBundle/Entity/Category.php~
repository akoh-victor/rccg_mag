<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**  
 * @ORM\Entity 
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository") 
 */

class Category
{  
	/** 
	 * @ORM\Column(type="integer") 
	 *  @ORM\Id 
	 *  @ORM\GeneratedValue(strategy="AUTO") 
	 */
	protected $id;
	/** 
	 *  @ORM\Column(type="string", length=100)
	 */
    protected $Name;

    
    
    /** 
     *  @ORM\OneToMany(targetEntity="News", mappedBy="category") 
     */
     protected $news;
     public function __construct() {
   	 $this->news = new ArrayCollection();
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
     * @return Category
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
     * Add news
     *
     * @param \AppBundle\Entity\News $news
     * @return Category
     */
    public function addNews(\AppBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \AppBundle\Entity\News $news
     */
    public function removeNews(\AppBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }
}
