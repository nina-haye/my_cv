<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
* @ApiResource
*
* @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
* @ORM\Table(name="app_experience")
*/
class Experience {

    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    
    private $id;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    
    private $entreprise;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    
    private $poste;
    
    /**
     * @ORM\Column(type="datetime")
     */
    
    private $date_debut;
    
    /**
     * @ORM\Column(type="datetime")
     */
    
    private $date_fin;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    
    private $lieu;
    
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    
    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }
    
    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;
        return $this;
    }
    
    public function getPoste(): ?string
    {
        return $this->poste;
    }
    
    public function setPoste(string $poste): self
    {
        $this->poste = $poste;
        return $this;
    }
    
    
    public function getDate_debut() : ?\DateTimeInterface
    {
        return $this->date_debut;
    }
    
    public function setDate_debut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut ;
        return $date_debut;
    }
    
    
    public function getDate_fin() : ?\DateTimeInterface
    {
        return $this->date_fin;
    }
    
    public function setDate_fin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin ;
        return $date_fin;
    }
    
    
    public function getLieu(): ?string
    {
        return $this->lieu;
    }
    
    public function setLieu(string $name): self
    {
        $this->lieu = $lieu;
        return $this;
    }
}
?>