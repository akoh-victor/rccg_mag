<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**  
 * @ORM\Entity 
 * @ORM\Table(name="testimonies")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestimonyRepository") 
 */

class Testimony
{  
	/** 
	 * @ORM\Column(type="integer") 
	 *  @ORM\Id 
	 *  @ORM\GeneratedValue(strategy="AUTO") 
	 */
	protected $id;
	
	
	/** 
	 *  @ORM\Column(type="string")
	 */
    protected $testifier;
    
    /**
     *  @ORM\Column(type="text")
     */
    protected $title;
    
    /**
     *  @ORM\Column(type="text")
     */
    protected $detail;
    /**
     *  @ORM\Column(type="text")
     */
    protected $PrayerPoint;
 
    /**
     *  @ORM\Column(type="integer")
     */
    protected $expired;
    
    
    /**
     *  @ORM\Column(type="date")
     */
    protected $PublishedAt;
    /**
     * @ORM\Column(type="string")
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 2MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $image;
   

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
     * Set testifier
     *
     * @param string $testifier
     * @return Testimony
     */
    public function setTestifier($testifier)
    {
        $this->testifier = $testifier;

        return $this;
    }

    /**
     * Get testifier
     *
     * @return string 
     */
    public function getTestifier()
    {
        return $this->testifier;
    }







    /**
     * Set detail
     *
     * @param string $detail
     * @return Testimony
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set PrayerPoint
     *
     * @param string $prayerPoint
     * @return Testimony
     */
    public function setPrayerPoint($prayerPoint)
    {
        $this->PrayerPoint = $prayerPoint;

        return $this;
    }

    /**
     * Get PrayerPoint
     *
     * @return string 
     */
    public function getPrayerPoint()
    {
        return $this->PrayerPoint;
    }

    /**
     * Set expired
     *
     * @param integer $expired
     * @return Testimony
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
     * Set PublishedAt
     *
     * @param \DateTime $publishedAt
     * @return Testimony
     */
    public function setPublishedAt($publishedAt)
    {
        $this->PublishedAt = $publishedAt;

        return $this;
    }

    /**
     * Get PublishedAt
     *
     * @return \DateTime 
     */
    public function getPublishedAt()
    {
        return $this->PublishedAt;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Testimony
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Testimony
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
