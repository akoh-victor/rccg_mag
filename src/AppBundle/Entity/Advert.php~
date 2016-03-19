<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="adverts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertRepository") 
 * 
 */
class Advert
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *  @ORM\Column(type="text")
     */
    protected $heading;
    /**
     *  @ORM\Column(type="text")
     */
    protected $companyName;

    /**
     *  @ORM\Column(type="date")
     */
    protected $publishedAt;
    
    /**
     *  @ORM\Column(type="text")
     */
    protected $detail;

    /**
     * @ORM\Column(type="string")
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 2MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $banner;
     
    /**
     *  @ORM\Column(type="string", length=78)
     */
    protected $advertiser;
    /**
     *  @ORM\Column(type="integer", length=1)
     */
    protected $expire;
    

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
     * Set companyName
     *
     * @param string $companyName
     * @return Advert
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set publishedAt
     *
     * @param \DateTime $publishedAt
     * @return Advert
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * Get publishedAt
     *
     * @return \DateTime 
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Advert
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
     * Set banner
     *
     * @param string $banner
     * @return Advert
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * Get banner
     *
     * @return string 
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Set advertiser
     *
     * @param string $advertiser
     * @return Advert
     */
    public function setAdvertiser($advertiser)
    {
        $this->advertiser = $advertiser;

        return $this;
    }

    /**
     * Get advertiser
     *
     * @return string 
     */
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * Set expire
     *
     * @param integer $expire
     * @return Advert
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get expire
     *
     * @return integer 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set heading
     *
     * @param string $heading
     * @return Advert
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string 
     */
    public function getHeading()
    {
        return $this->heading;
    }
}
