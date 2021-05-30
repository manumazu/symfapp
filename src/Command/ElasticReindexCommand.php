<?php

/*
* Generated with MakerBundle
*    ./bin/console make:command elastic:reindex
*/

namespace App\Command;

use App\Elasticsearch\ArticleIndexer;
use App\Elasticsearch\IndexBuilder;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ElasticReindexCommand extends Command
{

    protected static $defaultName = 'elastic:reindex';
    protected static $defaultDescription = 'Rebuild the Index and populate it.';

    private $indexBuilder;
    private $articleIndexer;

    public function __construct(IndexBuilder $indexBuilder, ArticleIndexer $articleIndexer)
    {
        $this->indexBuilder = $indexBuilder;
        $this->articleIndexer = $articleIndexer;

        parent::__construct();
    }    

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            /*->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')*/
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        //$arg1 = $input->getArgument('arg1');

        $index = $this->indexBuilder->create();

        $io->success('Index created!');

        $this->articleIndexer->indexAllDocuments($index->getName());

        $io->success('Index populated and ready!');


        /*if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');*/

        return Command::SUCCESS;
    }
}
