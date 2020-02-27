<?php

namespace App\Service;

use App\Entity\Answers\Answer;
use App\Entity\Answers\Profile;
use App\Entity\Answers\Skill;
use App\Entity\Question;

class ScoringService
{

    /**
     * @param Question $question
     * @return float
     */
    public function calculate(Question $question): float
    {
        $score = 0;

        /** @var Answer $answer */
        foreach ($question->getAnswers() as $answer) {
            if ($answer instanceof Profile) {
                $score += $answer->getValue() * $answer->getWeight() / 100;

            } elseif ($answer instanceof Skill) {
                if ($answer->isPunctuate()) {
                    $score += $answer->getValue();
                }
            }
        }

        return $score;
    }

}