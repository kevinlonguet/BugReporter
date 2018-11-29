<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/11/2018
 * Time: 10:24
 */

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

Trait SoftDeletedTrait
{

    /**
     * @var bool $deleted
     *
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $deleted;

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

}