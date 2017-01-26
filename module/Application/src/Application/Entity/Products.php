<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity
 *  @ORM\HasLifecycleCallbacks
 */
class Products
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    
    /**
     * @ORM\Column(name="title",type="string", length=255))
     */
    protected $title;

    /**
     * @ORM\Column(name="image",type="string", length=255))
     */
    protected $image;

    /**
     * @ORM\Column(name="price",type="decimal", precision=10, scale=2))
     */
    protected $price;
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set title
     *
     * @param string $title
     * @return Products
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
     * Set image
     *
     * @param integer $image
     * @return Products
     */
    public function setImage($image)
    {
    	$this->image = $image;
    
    	return $this;
    }
    
    /**
     * Get image
     *
     * @return integer
     */
    public function getImage()
    {
    	return $this->image;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }


}
