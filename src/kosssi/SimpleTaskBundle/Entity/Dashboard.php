<?php

namespace kosssi\SimpleTaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="dashboard")
 * @ORM\Entity
 */
class Dashboard
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $user
     *
     * @ORM\Column(name="user", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * @var ArrayCollection $labels
     *
     * @ORM\OneToMany(targetEntity="Label", mappedBy="dashboard")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $labels;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
}