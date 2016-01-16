<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utenze
 *
 * @ORM\Table(name="utenze")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UtenzeRepository")
 */
class Utenze extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="indirizzo_mail", type="string", length=255, nullable=true)
     */
    protected $indirizzoMail;


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
     * Set indirizzoMail
     *
     * @param string $indirizzoMail
     * @return Utenze
     */
    public function setIndirizzoMail($indirizzoMail)
    {
        $this->indirizzoMail = $indirizzoMail;

        return $this;
    }

    /**
     * Get indirizzoMail
     *
     * @return string 
     */
    public function getIndirizzoMail()
    {
        return $this->indirizzoMail;
    }
}
