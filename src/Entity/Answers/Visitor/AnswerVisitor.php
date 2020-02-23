<?php

namespace App\Entity\Answers\Visitor;

use App\Entity\Answers\Profile;
use App\Entity\Answers\Skill;

class AnswerVisitor implements Visitor
{

    /**
     * @param Skill $answer
     * @return float
     */
    public function visitScoreSkill(Skill $answer): float
    {
        if ($answer->isPunctuate()) {
            return $answer->getValue();
        }

        return 0;
    }


    /**
     * @param Profile $answer
     * @return float
     */
    public function visitScoreProfile(Profile $answer): float
    {
        return $answer->getValue() * $answer->getWeight() / 100;
    }

}