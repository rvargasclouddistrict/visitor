<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Question;

class ScoringService
{

    /**
     * @param Question $question
     * @return float
     * @throws \Exception
     */
    public function calculate(Question $question): float
    {
        $score = 0;

        /** @var Answer $answer */
        foreach ($question->getAnswers() as $answer) {
            switch ($answer->getType()) {
                case Answer::TYPE_SKILL:
                    if ($answer->isPunctuate()) {
                        $score += $answer->getValue();
                    }
                    break;

                case Answer::TYPE_PROFILE:
                    $score += $answer->getValue() * $answer->getWeight() / 100;
                    break;

                default:
                    throw new \Exception('Unsupported type');
            }
        }

        return $score;
    }

}