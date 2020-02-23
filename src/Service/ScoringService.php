<?php

namespace App\Service;

use App\Entity\Answers\Answer;
use App\Entity\Answers\Visitor\AnswerVisitor;
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
        $visitor = new AnswerVisitor();

        /** @var Answer $answer */
        foreach ($question->getAnswers() as $answer) {
            $score += $answer->scoreAccept($visitor);
        }

        return $score;
    }

}