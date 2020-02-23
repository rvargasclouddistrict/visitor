<?php

namespace App\Entity\Answers;

use App\Entity\Answers\Visitor\Visitor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="answer_profile")
 */
class Profile extends Answer
{

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
     * @param Visitor $visitor
     * @return float
     */
    public function ScoreAccept(Visitor $visitor): float
    {
        return $visitor->visitScoreProfile($this);
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
     * @return Profile
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

}
