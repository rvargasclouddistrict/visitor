<?php

namespace App\Entity;

use App\Entity\Answers\Answer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var Collection|null
     *
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="question", cascade={"persist"})
     */
    private $answers;

    /**
     * Question constructor.
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Question
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Answer $answer
     * @return Question
     */
    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setQuestion($this);
        }

        return $this;
    }

    /**
     * @param Answer $answer
     * @return Question
     */
    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $answer->setQuestion(null);
            $this->answers->removeElement($answer);
        }

        return $this;
    }

    /**
     * @return Collection<Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

}
