<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Config\FileLocator;

use AppBundle\Entity\User;

class CreateUserCommand extends ContainerAwareCommand
{
    /**
     * configure the name, description and options for this command
     */
    public function configure()
    {
        $this->setName('sandbox:createUser')
            ->setDescription('create a new user')
            ->addArgument('email',    InputArgument::OPTIONAL, 'Email for this user')
            ->addArgument('password', InputArgument::OPTIONAL, 'Password for this user');
    }

    /**
     * execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return resource
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $email    = trim($input->getArgument('email'));
        $password = trim($input->getArgument('password'));

        if (!($email && $password)) {
            $output->writeln('<comment>Please provide a email and password:</comment>');

            $helper   = $this->getHelper('question');
            $email    = $helper->ask($input, $output, $this->getEmailQuestion());
            $password = $helper->ask($input, $output, $this->getPasswordQuestion());
        }
        if ($this->createUser($email, $password) === true) {
            $output->writeln('<info>DONE</info>');
        } else {
            $output->writeln('<error>ERROR</error>');
        }
    }

    /**
     * @param $email
     * @param $password
     *
     * @return bool
     */
    public function createUser($email, $password)
    {
        $container = $this->getContainer();

        $entityManager = $container->get('doctrine')->getManager();

        $user = $entityManager->getRepository(User::class)->newUser();

        $encPassword = $container->get('security.password_encoder')->encodePassword($user, $password);

        $user->setFirstName('Admin')
            ->setLastName('User')
            ->setEmail($email)
            ->setPassword($encPassword)
            ->setActivated(true)
            // any user we add on the commandline will be considered an admin
            ->setAdminStatus(true);

        $entityManager->persist($user);
        $entityManager->flush();

        return true;
    }

    // utilities

    public function newQuestion($text)
    {
        return new Question($text);
    }

    public function getEmailQuestion()
    {
        return $this->newQuestion('  <info>Email</info>: ');
    }

    public function getPasswordQuestion()
    {
        $question = $this->newQuestion('  <info>Password</info>: ');

        $question->setHidden(true)
            ->setHiddenFallback(false)
            ->setValidator([$this, 'validatePassword']);

        return $question;
    }

    public function validatePassword($value)
    {
        if (trim($value) == '') {
            throw new \Exception('The password can not be empty');
        }
        return $value;
    }
}