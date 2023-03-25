<?php

declare(strict_types=1);

namespace App\Command;



use App\Shop\BooksDiscountMachine;
use App\Shop\BookService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:calculate-discount',
    description: 'Calculates and outputs Discount.',
    aliases: ['app:calculate-discount'],
    hidden: false
)]
class PurchaseBookCommand extends Command
{

    /**
     * @param BookService $bookService
     */
    public function __construct(protected BookService $bookService)
    {
        parent::__construct();
    }

    /**
     * Defines number of books per each book volume
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->addArgument('quantity1', InputArgument::REQUIRED, "Number of books.");
        $this->addArgument('quantity2', InputArgument::OPTIONAL, "Number of books.");
        $this->addArgument('quantity3', InputArgument::OPTIONAL, "Number of books.");
        $this->addArgument('quantity4', InputArgument::OPTIONAL, "Number of books.");
        $this->addArgument('quantity5', InputArgument::OPTIONAL, "Number of books.");

    }

    /**
     * retrieves the passed arguments into an array and passed it to Book Service for processing
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $items = [
            $input->getArgument('quantity1'),
            $input->getArgument('quantity2'),
            $input->getArgument('quantity3'),
            $input->getArgument('quantity4'),
            $input->getArgument('quantity5')
        ];
        ;
        $output->writeln(
            sprintf('The discounted price is %s %s',
                $this->bookService->calculateDiscount($items), BooksDiscountMachine::CURRENCY)
        );

        return Command::SUCCESS;
    }
}