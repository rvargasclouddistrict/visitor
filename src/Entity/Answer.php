<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Answer
{
    const TYPE_PROFILE = 1;
    const TYPE_SKILL = 2;

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
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\Positive()
     */
    private $value;

    /**
     * @var Question|null
     *
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $weight;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $punctuate;

    /**
     * @var int|null
     */
    private $type;

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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Answer
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return Answer
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Question|null
     */
    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    /**
     * @param Question|null $question
     *
     * @return Answer
     */
    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     * @return Answer
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPunctuate(): ?bool
    {
        return $this->punctuate;
    }

    /**
     * @param bool $punctuate
     * @return Answer
     */
    public function setPunctuate(bool $punctuate): self
    {
        $this->punctuate = $punctuate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     * @return Answer
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

}
