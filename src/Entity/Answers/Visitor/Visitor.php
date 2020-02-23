<?php

namespace App\Entity\Answers\Visitor;

use App\Entity\Answers\Profile;
use App\Entity\Answers\Skill;

interface Visitor
{
    /**
     * @param Skill $answer
     * @return float
     */
    public function visitScoreSkill(Skill $answer): float;

    /**
     * @param Profile $answer
     * @return float
     */
    public function visitScoreProfile(Profile $answer): float;

}