<?php

namespace IL\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SouscriptionMobile
 *
 * @ORM\Table(name="souscription_mobile")
 * @ORM\Entity(repositoryClass="IL\CoreBundle\Repository\SouscriptionMobileRepository")
 */
class SouscriptionMobile
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
     * @ORM\Column(name="operateur", type="string", length=255)
     */
    private $operateur;

    /**
     * @var string
     * @Assert\Length(
     *      min = 16,
     *      max = 16,
     *      minMessage = "Le numero de la carte ne doit p {{ limit }} caracteres",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
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
     * @ORM\Column(name="annee_expiration", type="string", length=255)
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
     * @var bool
     *
     * @ORM\Column(name="w2c", type="boolean")
     */
    private $w2c;

    /**
     * @var bool
     *
     * @ORM\Column(name="c2w", type="boolean")
     */
    private $c2w;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set operateur
     *
     * @param string $operateur
     *
     * @return SouscriptionMobile
     */
    public function setOperateur($operateur)
    {
        $this->operateur = $operateur;

        return $this;
    }

    /**
     * Get operateur
     *
     * @return string
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * Set numeroCarte
     *
     * @param string $numeroCarte
     *
     * @return SouscriptionMobile
     */
    public function setNumeroCarte($numeroCarte)
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    /**
     * Get numeroCarte
     *
     * @return string
     */
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set moisExpiration
     *
     * @param string $moisExpiration
     *
     * @return SouscriptionMobile
     */
    public function setMoisExpiration($moisExpiration)
    {
        $this->moisExpiration = $moisExpiration;

        return $this;
    }

    /**
     * Get moisExpiration
     *
     * @return string
     */
    public function getMoisExpiration()
    {
        return $this->moisExpiration;
    }

    /**
     * Set anneeExpiration
     *
     * @param integer $anneeExpiration
     *
     * @return SouscriptionMobile
     */
    public function setAnneeExpiration($anneeExpiration)
    {
        $this->anneeExpiration = $anneeExpiration;

        return $this;
    }

    /**
     * Get anneeExpiration
     *
     * @return int
     */
    public function getAnneeExpiration()
    {
        return $this->anneeExpiration;
    }

    /**
     * Set typeCarte
     *
     * @param string $typeCarte
     *
     * @return SouscriptionMobile
     */
    public function setTypeCarte($typeCarte)
    {
        $this->typeCarte = $typeCarte;

        return $this;
    }

    /**
     * Get typeCarte
     *
     * @return string
     */
    public function getTypeCarte()
    {
        return $this->typeCarte;
    }

    /**
     * Set statutLiaison
     *
     * @param string $statutLiaison
     *
     * @return SouscriptionMobile
     */
    public function setStatutLiaison($statutLiaison)
    {
        $this->statutLiaison = $statutLiaison;

        return $this;
    }

    /**
     * Get statutLiaison
     *
     * @return string
     */
    public function getStatutLiaison()
    {
        return $this->statutLiaison;
    }

    /**
     * Set statutCarte
     *
     * @param string $statutCarte
     *
     * @return SouscriptionMobile
     */
    public function setStatutCarte($statutCarte)
    {
        $this->statutCarte = $statutCarte;

        return $this;
    }

    /**
     * Get statutCarte
     *
     * @return string
     */
    public function getStatutCarte()
    {
        return $this->statutCarte;
    }

    /**
     * Set nomCarte
     *
     * @param string $nomCarte
     *
     * @return SouscriptionMobile
     */
    public function setNomCarte($nomCarte)
    {
        $this->nomCarte = $nomCarte;

        return $this;
    }

    /**
     * Get nomCarte
     *
     * @return string
     */
    public function getNomCarte()
    {
        return $this->nomCarte;
    }

    /**
     * Set labelCompte
     *
     * @param string $labelCompte
     *
     * @return SouscriptionMobile
     */
    public function setLabelCompte($labelCompte)
    {
        $this->labelCompte = $labelCompte;

        return $this;
    }

    /**
     * Get labelCompte
     *
     * @return string
     */
    public function getLabelCompte()
    {
        return $this->labelCompte;
    }

    /**
     * Set aliasCompte
     *
     * @param string $aliasCompte
     *
     * @return SouscriptionMobile
     */
    public function setAliasCompte($aliasCompte)
    {
        $this->aliasCompte = $aliasCompte;

        return $this;
    }

    /**
     * Get aliasCompte
     *
     * @return string
     */
    public function getAliasCompte()
    {
        return $this->aliasCompte;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return SouscriptionMobile
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set w2c
     *
     * @param boolean $w2c
     *
     * @return SouscriptionMobile
     */
    public function setW2c($w2c)
    {
        $this->w2c = $w2c;

        return $this;
    }

    /**
     * Get w2c
     *
     * @return bool
     */
    public function getW2c()
    {
        return $this->w2c;
    }

    /**
     * Set c2w
     *
     * @param boolean $c2w
     *
     * @return SouscriptionMobile
     */
    public function setC2w($c2w)
    {
        $this->c2w = $c2w;

        return $this;
    }

    /**
     * Get c2w
     *
     * @return bool
     */
    public function getC2w()
    {
        return $this->c2w;
    }

    /**
     * Set balanceInquery
     *
     * @param string $balanceInquery
     *
     * @return SouscriptionMobile
     */
    public function setBalanceInquery($balanceInquery)
    {
        $this->balanceInquery = $balanceInquery;

        return $this;
    }

    /**
     * Get balanceInquery
     *
     * @return string
     */
    public function getBalanceInquery()
    {
        return $this->balanceInquery;
    }

    /**
     * Set miniStatement
     *
     * @param boolean $miniStatement
     *
     * @return SouscriptionMobile
     */
    public function setMiniStatement($miniStatement)
    {
        $this->miniStatement = $miniStatement;

        return $this;
    }

    /**
     * Get miniStatement
     *
     * @return bool
     */
    public function getMiniStatement()
    {
        return $this->miniStatement;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SouscriptionMobile
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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






}

