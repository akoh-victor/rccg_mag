<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**  
 * @ORM\Entity 
 * @ORM\Table(name="notice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoticeRepository") 
 */

class Notice
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", length =100)
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $detail;

    /**
     * @ORM\Column(type="integer")
     */
    protected $expired;


    /**
     * @ORM\Column(type="date")
     */
    protected $PublishedAt;



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
     * Set title
     *
     * @param string $title
     * @return Notice
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

    /**
     * Set detail
     *
     * @param string $detail
     * @return Notice
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
     * Set expired
     *
     * @param integer $expired
     * @return Notice
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
     * @return Notice
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
}
