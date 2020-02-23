<?php

namespace App\Entity\Answers;

use App\Entity\Answers\Visitor\Visitor;
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

    /**
     * @param Visitor $visitor
     * @return float
     */
    public function ScoreAccept(Visitor $visitor): float
    {
        return $visitor->visitScoreSkill($this);
    }

}
