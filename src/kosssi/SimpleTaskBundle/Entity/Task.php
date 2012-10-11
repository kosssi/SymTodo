<?php

namespace kosssi\SimpleTaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use kosssi\SimpleTaskBundle\Entity\Label;

/**
 * @ORM\Table(name="task")
 * @ORM\Entity
 */
class Task
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
     * @var boolean $completed
     *
     * @ORM\Column(name="completed", type="boolean")
     */
    private $completed = false;

    /**
     * @var boolean $historical
     *
     * @ORM\Column(name="historical", type="boolean")
     */
    private $historical = false;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime $start
     *
     * @ORM\Column(name="start", type="date", nullable=true)
     * @Assert\DateTime()
     */
    private $start;

    /**
     * @var \DateTime $end
     *
     * @ORM\Column(name="end", type="date", nullable=true)
     * @Assert\DateTime()
     */
    private $end;

    /**
     * @var \DateTime $time
     *
     * @ORM\Column(name="time", type="date", nullable=true)
     * @Assert\DateTime()
     */
    private $time;
    
    /**
     * @var Label $label
     * 
     * @ORM\ManyToOne(targetEntity="Label", inversedBy="tasks")
     */
    protected $label;

    /**
     * @param boolean $completed
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    }

    /**
     * @return boolean
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param boolean $historical
     */
    public function setHistorical($historical)
    {
        $this->historical = $historical;
    }

    /**
     * @return boolean
     */
    public function getHistorical()
    {
        return $this->historical;
    }

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
     * @param \kosssi\SimpleTaskBundle\Entity\Label $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return \kosssi\SimpleTaskBundle\Entity\Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}