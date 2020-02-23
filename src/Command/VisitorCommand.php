<?php

namespace App\Command;

use App\Entity\Answers\Profile;
use App\Entity\Answers\Skill;
use App\Entity\Question;
use App\Service\ScoringService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class VisitorCommand extends Command
{
    protected static $defaultName = 'visitor';
    private $scoringService;

    /**
     * VisitorCommand constructor.
     * @param null|string $name
     * @param ScoringService $scoringService
     */
    public function __construct($name = null, ScoringService $scoringService)
    {
        parent::__construct($name);
        $this->scoringService = $scoringService;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $question = new Question();
        $question->setName('Visitor question');

        $answerProfile = new Profile();
        $answerProfile
            ->setWeight(50)
            ->setName('answer type profile')
            ->setValue(100);

        $answerSkill = new Skill();
        $answerSkill
            ->setPunctuate(true)
            ->setName('answer type skill punctuate')
            ->setValue(200);

        $answerSkill2 = new Skill();
        $answerSkill2
            ->setName('answer type skill not punctuate')
            ->setValue(500);

        $question
            ->addAnswer($answerProfile)
            ->addAnswer($answerSkill)
            ->addAnswer($answerSkill2);

        $score = $this->scoringService->calculate($question);

        $io->comment($score);

        return 0;
    }
}
