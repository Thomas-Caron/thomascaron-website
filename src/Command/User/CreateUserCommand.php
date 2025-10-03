<?php

namespace App\Command\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:user:create',
    description: 'Create a user.'
)]
class CreateUserCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher
    )
    {
        parent::__construct(null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        /** @var \Symfony\Component\Console\Helper\QuestionHelper $helper */
        $helper = $this->getHelper('question');

        $user = new User();

        $mailQuestion = new Question('Adresse email ?');
        $user->setEmail(
            $helper->ask($input, $output, $mailQuestion)
        );

        $passwordQuestion = new Question('Password ?');
        $passwordQuestion->setHidden(true);
        $passwordQuestion->setHiddenFallback(false);
        $hashedPassword = $this->passwordHasher->hashPassword($user, $helper->ask($input, $output, $passwordQuestion));
        $user->setPassword($hashedPassword);

        $roleQuestion = new Question('Rôle ?');
        $response = strtoupper($helper->ask($input, $output, $roleQuestion));
        $user->setRoles(
            ["ROLE_{$response}"]
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success("Vous pouvez maintenant vous connecter avec l'adresse email : " . $user->getEmail());

        return Command::SUCCESS;
    }
}
