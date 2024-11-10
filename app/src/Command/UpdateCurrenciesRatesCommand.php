<?php

namespace App\Command;

use App\Service\UpdateRates;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'update-currencies-rates',
    description: 'Grabs currencies rates from external APIs and updates them in the database',
)]
class UpdateCurrenciesRatesCommand extends Command
{
    public function __construct(
        private readonly UpdateRates $updateRates,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->updateRates->updateRates();

        $io->success('Done!');

        return Command::SUCCESS;
    }
}
