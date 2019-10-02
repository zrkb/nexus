<?php

namespace Pandorga\Nexus\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

class SeedCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'nexus:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed Nexus Data';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->comment(PHP_EOL . 'Nexus seed started' . PHP_EOL);

		$this->line('→ Running wizard ... <info>✔</info>');
		$this->call('db:seed', ['--class' => 'Pandorga\Nexus\Database\Seeds\NexusSeeder']);

		$this->info(PHP_EOL . 'Done.');
	}
}
