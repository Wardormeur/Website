<?php

namespace CoderDojo\WebsiteBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="fos_user")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
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
     * @var Dojo[]
     * @ORM\ManyToMany(targetEntity="Dojo", mappedBy="owners", cascade={"persist"})
     **/
    private $dojos;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(type="string", length=10)
     */
    private $phone;

    /**
     * @var DojoRequest[]
     * @ORM\OneToMany(targetEntity="DojoRequest", mappedBy="user", cascade={"persist", "remove"})
     **/
    private $dojoRequests;

    /**
     * @var Claim[]
     * @ORM\OneToMany(targetEntity="Claim", mappedBy="user", cascade={"persist", "remove"})
     **/
    private $claims;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateTimeAcceptedPrivacy;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $privacyMailSent = false;

    public function __construct()
    {
        parent::__construct();
        $this->dojos = new ArrayCollection();
        $this->dojoRequests = new ArrayCollection();
        $this->dateTimeAcceptedPrivacy = new \DateTime;
    }

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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->setUsername($email);
        parent::setEmail($email);
    }

    /**
     * Add dojos
     *
     * @param Dojo $dojo
     * @return User
     */
    public function addDojo(Dojo $dojo)
    {
        $this->dojos[] = $dojo;

        return $this;
    }

    /**
     * Remove dojo
     *
     * @param Dojo $dojo
     */
    public function removeDojo(Dojo $dojo)
    {
        $this->dojos->removeElement($dojo);
    }

    /**
     * Get dojos
     *
     * @return Dojo[]|ArrayCollection
     */
    public function getDojos()
    {
        return $this->dojos;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return DojoRequest[]
     */
    public function getDojoRequests()
    {
        return $this->dojoRequests;
    }

    /**
     * @param DojoRequest $request
     */
    public function addDojoRequest(DojoRequest $request)
    {
        $this->dojoRequests->add($request);
    }

    /**
     * @return Claim[]
     */
    public function getClaims()
    {
        return $this->claims;
    }

    /**
     * @param $claim
     */
    public function addClaim($claim)
    {
        $this->claims = $claim;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateTimeAcceptedPrivacy()
    {
        return $this->dateTimeAcceptedPrivacy;
    }

    /**
     * @param \DateTimeImmutable $dateTimeAcceptedPrivacy
     */
    public function setDateTimeAcceptedPrivacy($dateTimeAcceptedPrivacy)
    {
        $this->dateTimeAcceptedPrivacy = $dateTimeAcceptedPrivacy;
    }

    /**
     * @return bool
     */
    public function isPrivacyMailSent(): bool
    {
        return $this->privacyMailSent;
    }

    /**
     * @param bool $privacyMailSent
     */
    public function setPrivacyMailSent(bool $privacyMailSent): void
    {
        $this->privacyMailSent = $privacyMailSent;
    }
}
