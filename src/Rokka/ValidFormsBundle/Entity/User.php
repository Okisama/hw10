<?php

namespace Rokka\ValidFormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Ass;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @UniqueEntity("mail")
 * @UniqueEntity("login")
 * @ORM\Entity(repositoryClass="Rokka\ValidFormsBundle\Repository\UserRepository")
 */

class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")

     */

    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Your логин name must be at least {{ limit }} characters long",
     *      maxMessage = "Your login name cannot be longer than {{ limit }} characters"
     * )
     */
    private $login;
    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $firstname;
    /**
     * @ORM\Column(type="string", length=100)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Your last name must be at least {{ limit }} characters long",
     *      maxMessage = "Your last name cannot be longer than {{ limit }} characters"
     * )
     */
    private $lastname;
    /**
     * @ORM\Column(type="string", length=100)
     * @Ass\Choice(choices = {"male", "female"}, message = "Choose a valid gender.")
     */
    protected $gender;
    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Ass\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $mail;
    /**
     * @ORM\Column(type="string", length=100)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 8,
     *      max = 100,
     *      minMessage = "Your password  must be at least {{ limit }} characters long",
     *      maxMessage = "Your password cannot be longer than {{ limit }} characters"
     * )
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adress;
    /**
     * @ORM\Column(type="date")
     * @Ass\Date()
     */
    private $borthday;
    /**
     * @ORM\Column(type="decimal")
     * @Ass\NotNull()
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="User")
     */

    private $post;


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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set borthday
     *
     * @param \DateTime $borthday
     *
     * @return User
     */
    public function setBorthday($borthday)
    {
        $this->borthday = $borthday;

        return $this;
    }

    /**
     * Get borthday
     *
     * @return \DateTime
     */
    public function getBorthday()
    {
        return $this->borthday;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->post = new ArrayCollection();
    }

    /**
     * Add post
     *
     * @param \Rokka\ValidFormsBundle\Entity\Post $post
     *
     * @return User
     */
    public function addPost(Post $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \Rokka\ValidFormsBundle\Entity\Post $post
     */
    public function removePost(Post $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPost()
    {
        return $this->post;
    }
}
