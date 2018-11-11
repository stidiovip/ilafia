<?php

namespace IL\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SouscriptionBanque
 *
 * @ORM\Table(name="souscription_banque")
 * @ORM\Entity(repositoryClass="IL\CoreBundle\Repository\SouscriptionBanqueRepository")
 */
class SouscriptionBanque
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
     * @var bool
     *
     * @ORM\Column(name="cb2c", type="boolean")
     */
    private $cb2c;

    /**
     * @var bool
     *
     * @ORM\Column(name="c2cb", type="boolean")
     */
    private $c2cb;

    /**
     * @var string
     *
     * @ORM\Column(name="type_compte", type="string", length=255)
     */
    private $typeCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte", type="string", length=255)
     */
    private $numeroCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_carte", type="string", length=255)
     */
    private $numeroCarte;
    /**
     * @var string
     *
     * @ORM\Column(name="numero_telephone", type="string", length=255)
     */
    private $numeroTelephone;



    /**
     * @var string
     *
     * @ORM\Column(name="mois_expiration", type="string", length=255)
     */
    private $moisExpiration;

    /**
     * @var int
     *
     * @ORM\Column(name="annee_expiration", type="integer")
     */
    private $anneeExpiration;

    /**
     * @var string
     *
     * @ORM\Column(name="type_carte", type="string", length=255)
     */
    private $typeCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_liaison", type="string", length=255)
     */
    private $statutLiaison;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_carte", type="string", length=255)
     */
    private $statutCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_carte", type="string", length=255)
     */
    private $nomCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="label_compte", type="string", length=255)
     */
    private $labelCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="alias_compte", type="string", length=255, nullable=true)
     */
    private $aliasCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255, nullable=true)
     */
    private $raison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="IL\UserBundle\Entity\User")
     */
    private $effectuerPar;

    /**
     * @var bool
     *
     * @ORM\Column(name="balance_inquery", type="boolean")
     */
    private $balanceInquery;

    /**
     * @var bool
     *
     * @ORM\Column(name="mini_statement", type="boolean")
     */
    private $miniStatement;


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
     * Set cb2c
     *
     * @param boolean $cb2c
     *
     * @return SouscriptionBanque
     */
    public function setCb2c($cb2c)
    {
        $this->cb2c = $cb2c;

        return $this;
    }

    /**
     * Get cb2c
     *
     * @return bool
     */
    public function getCb2c()
    {
        return $this->cb2c;
    }

    /**
     * Set c2cb
     *
     * @param boolean $c2cb
     *
     * @return SouscriptionBanque
     */
    public function setC2cb($c2cb)
    {
        $this->c2cb = $c2cb;

        return $this;
    }

    /**
     * Get c2cb
     *
     * @return bool
     */
    public function getC2cb()
    {
        return $this->c2cb;
    }

    /**
     * Set typeCompte
     *
     * @param string $typeCompte
     *
     * @return SouscriptionBanque
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * Get typeCompte
     *
     * @return string
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * @return string
     */
    public function getNumeroCompte()
    {
        return $this->numeroCompte;
    }

    /**
     * @param string $numeroCompte
     */
    public function setNumeroCompte($numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;
    }

    /**
     * @return string
     */
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * @param string $numeroCarte
     */
    public function setNumeroCarte($numeroCarte)
    {
        $this->numeroCarte = $numeroCarte;
    }

    /**
     * @return string
     */
    public function getMoisExpiration()
    {
        return $this->moisExpiration;
    }

    /**
     * @param string $moisExpiration
     */
    public function setMoisExpiration($moisExpiration)
    {
        $this->moisExpiration = $moisExpiration;
    }

    /**
     * @return int
     */
    public function getAnneeExpiration()
    {
        return $this->anneeExpiration;
    }

    /**
     * @param int $anneeExpiration
     */
    public function setAnneeExpiration($anneeExpiration)
    {
        $this->anneeExpiration = $anneeExpiration;
    }

    /**
     * @return string
     */
    public function getTypeCarte()
    {
        return $this->typeCarte;
    }

    /**
     * @param string $typeCarte
     */
    public function setTypeCarte($typeCarte)
    {
        $this->typeCarte = $typeCarte;
    }

    /**
     * @return string
     */
    public function getStatutLiaison()
    {
        return $this->statutLiaison;
    }

    /**
     * @param string $statutLiaison
     */
    public function setStatutLiaison($statutLiaison)
    {
        $this->statutLiaison = $statutLiaison;
    }

    /**
     * @return string
     */
    public function getStatutCarte()
    {
        return $this->statutCarte;
    }

    /**
     * @param string $statutCarte
     */
    public function setStatutCarte($statutCarte)
    {
        $this->statutCarte = $statutCarte;
    }

    /**
     * @return string
     */
    public function getNomCarte()
    {
        return $this->nomCarte;
    }

    /**
     * @param string $nomCarte
     */
    public function setNomCarte($nomCarte)
    {
        $this->nomCarte = $nomCarte;
    }

    /**
     * @return string
     */
    public function getLabelCompte()
    {
        return $this->labelCompte;
    }

    /**
     * @param string $labelCompte
     */
    public function setLabelCompte($labelCompte)
    {
        $this->labelCompte = $labelCompte;
    }

    /**
     * @return string
     */
    public function getAliasCompte()
    {
        return $this->aliasCompte;
    }

    /**
     * @param string $aliasCompte
     */
    public function setAliasCompte($aliasCompte)
    {
        $this->aliasCompte = $aliasCompte;
    }

    /**
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * @param string $raison
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getEffectuerPar()
    {
        return $this->effectuerPar;
    }

    /**
     * @param mixed $effectuerPar
     */
    public function setEffectuerPar($effectuerPar)
    {
        $this->effectuerPar = $effectuerPar;
    }

    /**
     * @return bool
     */
    public function isBalanceInquery()
    {
        return $this->balanceInquery;
    }

    /**
     * @param bool $balanceInquery
     */
    public function setBalanceInquery($balanceInquery)
    {
        $this->balanceInquery = $balanceInquery;
    }

    /**
     * @return bool
     */
    public function isMiniStatement()
    {
        return $this->miniStatement;
    }

    /**
     * @param bool $miniStatement
     */
    public function setMiniStatement($miniStatement)
    {
        $this->miniStatement = $miniStatement;
    }

    /**
     * @return string
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }

    /**
     * @param string $numeroTelephone
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;
    }






}

