<?php

namespace App\Entity\Answers;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="answer_skill")
 */
class Skill extends Answer
{

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $punctuate;

    /**
     * @return bool
     */
    public function isPunctuate(): ?bool
    {
        return $this->punctuate;
    }

    /**
     * @param bool $punctuate
     *
     * @return Skill
     */
    public function setPunctuate(bool $punctuate): self
    {
        $this->punctuate = $punctuate;

        return $this;
    }

}
