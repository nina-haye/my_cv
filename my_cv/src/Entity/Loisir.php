<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
* @ApiResource
*
* @ORM\Entity(repositoryClass="App\Repository\LoisirRepository")
* @ORM\Table(name="app_loisir")
*/
class Loisir {

    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    
    private $id;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    
    private $name;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    
    private $comment;
    
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    
    public function getComment(): ?string
    {
        return $this->comment;
    }
    
    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }
}
?>