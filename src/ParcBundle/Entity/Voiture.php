<?php

namespace ParcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="ParcBundle\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Serie", type="string", length=255)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="DateMiseCirculation", type="string", length=255)
     */
    private $dateMiseCirculation;

    /**
     * @var string
     *
     * @ORM\Column(name="Marque", type="string", length=255)
     */
    private $marque;


    /**
     * @var int
     * 
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumn(name="modele_id", referencedColumnName="id") 
      */
      private $modele;




      public function setModele($modele)
      {
          $this->modele = $modele;
  
          return $this;
      }

      public function getModele()
    {
        return $this->modele;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set serie
     *
     * @param string $serie
     *
     * @return Voiture
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set dateMiseCirculation
     *
     * @param string $dateMiseCirculation
     *
     * @return Voiture
     */
    public function setDateMiseCirculation($dateMiseCirculation)
    {
        $this->dateMiseCirculation = $dateMiseCirculation;

        return $this;
    }

    /**
     * Get dateMiseCirculation
     *
     * @return string
     */
    public function getDateMiseCirculation()
    {
        return $this->dateMiseCirculation;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Voiture
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }
}

