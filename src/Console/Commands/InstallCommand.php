<?php

namespace Pandorga\Nexus\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

class InstallCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'nexus:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Nexus Admin Package';

	/**
	 * Install directory.
	 *
	 * @var string
	 */
	protected $directory = '';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Filesystem $filesystem)
	{
		parent::__construct();

		$this->filesystem = $filesystem;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->comment(PHP_EOL . 'Nexus installation started' . PHP_EOL);

		$this->line('→ Publishing vendor files ... <info>✔</info>');
		$this->callSilent('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

		if ($this->migrationFileIsMissing('*_create_activity_log_table.php')) {
			$this->callSilent('vendor:publish', ['--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider']);
		}

		if ($this->migrationFileIsMissing('*_create_mediable_tables.php')) {
			$this->callSilent('vendor:publish', ['--provider' => 'Plank\Mediable\MediableServiceProvider']);
		}

		$this->line('→ Publishing Nexus Service Provider ... <info>✔</info>');
		$this->callSilent('vendor:publish', [
			'--provider' => 'Pandorga\Nexus\NexusServiceProvider',
		]);
		$this->callSilent('vendor:publish', [
			'--tag' => 'nexus-factories',
			'--force' => true,
		]);

		$this->initializeBackendDir();

		$this->info(PHP_EOL . 'Done.');
	}

	public function initializeBackendDir()
	{
		$this->line('→ Initializing Nexus directory ... <info>✔</info>');

		$this->directory = config('nexus.directory');
		$this->makeDir('/');

		$this->createAppController();
	}

	/**
	 * Create Backend Controller
	 *
	 * @return void
	 */
	public function createAppController()
	{
		$filename = config('nexus.controller');
		
		$appController = $this->directory . '/' . $filename . '.php';
		$contents = $this->getStub($filename);

		$this->filesystem->put($appController, $contents);
	}

	/**
	 * Get stub contents.
	 *
	 * @param $name
	 *
	 * @return string
	 */
	protected function getStub($name)
	{
		return $this->filesystem->get(__DIR__ . '/stubs/' . $name . '.stub');
	}

	/**
	 * Make new directory.
	 *
	 * @param string $path
	 */
	protected function makeDir($path = '')
	{
		$this->filesystem->makeDirectory("{$this->directory}/$path", 0755, true, true);
	}

	/**
	 * Check if migration file exists.
	 *
	 * @return bool
	 */
	protected function migrationFileIsMissing($filename) : bool
	{
		$timestamp = date('Y_m_d_His');
		$folder = app()->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR;

		return Collection::make($folder)
			->flatMap(function ($path) use ($filename) {
				return $this->filesystem->glob($path . $filename);
			})
			->isEmpty();
	}
}
