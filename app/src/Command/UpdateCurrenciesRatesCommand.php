<?php

namespace App\Command;

use App\Entity\CurrencyRate;
use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\Repository\CurrencyRateRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'update-currencies-rates',
    description: 'Grabs currencies rates from external API and updates them in the database',
)]
class UpdateCurrenciesRatesCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CurrencyRateRepository $currencyRateRepository
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $currencyRate = (new CurrencyRate())
        ->setCurrency(CurrencyEnum::BRL)
            ->setRate('45.3334')
            ->setDate(new \DateTimeImmutable())
            ->setProvider(ProviderEnum::ECB);

        $this->entityManager->persist($currencyRate);
        $this->entityManager->flush();

        /*dd(
            $this->currencyRateRepository->findOneBy(['id'=>1])
        );*/






        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
