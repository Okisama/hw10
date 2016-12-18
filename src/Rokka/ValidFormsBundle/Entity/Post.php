<?php

namespace Rokka\ValidFormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Ass;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Rokka\ValidFormsBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="caption", type="string", length=100)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="shortText", type="string", length=255)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $shortText;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=1000)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 250,
     *      max = 1000,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $text;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Post")
     * @Ass\Valid()
     *
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Ass\Date()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=30)
     * @Ass\NotBlank()
     * @Ass\NotNull()
     * @Ass\Type("string")
     * @Ass\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     *
     */
    private $tag;


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
     * Set caption
     *
     * @param string $caption
     *
     * @return Post
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set shortText
     *
     * @param string $shortText
     *
     * @return Post
     */
    public function setShortText($shortText)
    {
        $this->shortText = $shortText;

        return $this;
    }

    /**
     * Get shortText
     *
     * @return string
     */
    public function getShortText()
    {
        return $this->shortText;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Post
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Post
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
     * Set tag
     *
     * @param string $tag
     *
     * @return Post
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
}
