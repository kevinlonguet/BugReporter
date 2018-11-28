<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/11/2018
 * Time: 10:24
 */

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

Trait PublishedTrait
{

    /**
     * @var bool $published
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $published;

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published): void
    {
        $this->published = $published;
    }

}