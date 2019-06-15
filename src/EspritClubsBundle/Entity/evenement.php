<?php

namespace EspritClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EspritClubsBundle\Repository\evenementRepository")
 */
class evenement
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participant", type="integer")
     */
    private $nbParticipant;


    /**
     * @var club
     * @ORM\ManyToOne(targetEntity="club")
     * @ORM\JoinColumn(name="club_id"  ,referencedColumnName="id")
     */
    private $club;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return evenement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nbParticipant
     *
     * @param integer $nbParticipant
     *
     * @return evenement
     */
    public function setNbParticipant($nbParticipant)
    {
        $this->nbParticipant = $nbParticipant;

        return $this;
    }

    /**
     * Get nbParticipant
     *
     * @return int
     */
    public function getNbParticipant()
    {
        return $this->nbParticipant;
    }

    /**
     * Set club
     *
     * @param \EspritClubsBundle\Entity\club $club
     *
     * @return evenement
     */
    public function setClub(\EspritClubsBundle\Entity\club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \EspritClubsBundle\Entity\club
     */
    public function getClub()
    {
        return $this->club;
    }
}
