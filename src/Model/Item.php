<?php

namespace App\Model;

class Item
{
    private $id;
    private $title;
    private $rate;
    private $description;
    private $image_src;
    private $author_id;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image_src
     */
    public function getImage_src()
    {
        return $this->image_src;
    }

    /**
     * Set the value of image_src
     *
     * @return  self
     */
    public function setImage_src($image_src)
    {
        $this->image_src = $image_src;

        return $this;
    }

    /**
     * Get the value of author_id
     */
    public function getAuthor_id()
    {
        return $this->author_id;
    }

    /**
     * Set the value of author_id
     *
     * @return  self
     */
    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;

        return $this;
    }
}
