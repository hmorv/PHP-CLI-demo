<?php namespace Palmacodi;

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class NewCommand extends Command
{
	public function configure()
	{
		$this->setName('new')
			->setDescription('Create a new Application.')
			->addArgument('name', InputArgument::REQUIRED);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$directory = getcwd() . '/' . $input->getArgument('name'); 
		$this->assertApplicationDoesNotExist($directory, $output);

	}

	private function assertApplicationDoesNotExist ($directory, OutputInterface $output)
	{
		if (is_dir($directory)) {
			$output->writeln('Application already exists!');
			exit(1);
		}
	}
}