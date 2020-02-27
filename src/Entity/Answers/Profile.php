<?php

namespace App\Entity\Answers;

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
