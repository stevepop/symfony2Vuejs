<?php

namespace AppBundle\Command;

use AppBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Config\FileLocator;

class CreateContactsCommand extends ContainerAwareCommand
{
    /**
     * configure the name, description and options for this command
     */
    public function configure()
    {
        $this->setName('sandbox:createContacts')
            ->setDescription('create sample contacts');
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
        $this->createContact();

        $output->writeln('<info>Contacts created successfully</info>');
    }

    public function createContact()
    {
        $container = $this->getContainer();

        $entityManager = $container->get('doctrine')->getManager();

        //Create first contact
        $contact = $entityManager->getRepository(Contact::class)->newContact();
        $contact->setFirstName('John');
        $contact->setLastName('Doe');
        $contact->setDob(new \DateTime('1990-02-21'));
        $contact->setEmail('john@doe.com');
        $contact->setHomeAddress('77 Cally road, London');
        $contact->setMobile('07820020020');
        $contact->setPhone('02025112448');
        $entityManager->persist($contact);

        //Create second contact
        $contact2 = $entityManager->getRepository(Contact::class)->newContact();
        $contact2->setFirstName('Jane');
        $contact2->setLastName('Doe');
        $contact2->setDob(new \DateTime('1995-08-15'));
        $contact2->setEmail('jane@doe.com');
        $contact2->setHomeAddress('1 London road, Essex');
        $contact2->setMobile('07910010010');
        $contact2->setPhone('02023412345');
        $entityManager->persist($contact2);

        // Flush
        $entityManager->flush();
    }
}