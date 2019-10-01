<?php

namespace Pandorga\Laramie\Console\Commands;

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
	protected $signature = 'laramie:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed Laramie Data';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->comment(PHP_EOL . 'Laramie seed started' . PHP_EOL);

		$this->line('→ Running wizard ... <info>✔</info>');
		$this->call('db:seed', ['--class' => 'Pandorga\Laramie\Database\Seeds\LaramieSeeder']);

		$this->info(PHP_EOL . 'Done.');
	}
}
