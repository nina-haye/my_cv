<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ApiResource
*
* @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
* @ORM\Table(name="app_formation")
*/
class Formation {

    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    
    private $id;
    
    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank
    * @Assert\Type("string")
    */
    
    private $name;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    
    private $date_debut;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    
    private $date_fin;
    
    /**
     * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank
    * @Assert\Type("string")
     */
    
    private $lieu;
    
    
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
    
    
    public function getDateDebut() : ?\DateTimeInterface
    {
        return $this->date_debut;
    }
    
    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }
    
    
    public function getDateFin() : ?\DateTimeInterface
    {
        return $this->date_fin;
    }
    
    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;
        return $this;
    }
    
    
    public function getLieu(): ?string
    {
        return $this->lieu;
    }
    
    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;
        return $this;
    }
}
?>