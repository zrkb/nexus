<?php

namespace Nexus\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Nexus\Models\AuthorizeAction;
use Nexus\Models\Permission;
use Nexus\Models\Role;

class ForgeResource extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'nexus:resource {name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Forge a resource';

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
		$this->createMigration();
		$this->createModel();
		$this->createController();
		$this->createResourceModel();
		$this->createAndAssignPermissions();
	}

	public function createMigration()
	{

		$table = Str::plural(Str::snake(class_basename($this->argument('name'))));

		if ($this->migrationFileIsMissing(sprintf('*_create_%s_table.php', $table))) {
			$this->call('make:migration', [
				'name' => "create_{$table}_table",
			]);
		} else {
			$this->error('Migration already exists!');
		}
	}

	public function createModel()
	{
		$model = Str::singular(Str::studly(class_basename($this->argument('name'))));

		$this->call('nexus:model', [
			'name' => $model,
			'--force',
		]);
	}

	public function createController()
	{
		$this->call('nexus:controller', [
			'name' => $this->argument('name'),
			'--force',
		]);
	}

	public function createResourceModel()
	{
		$model = Str::singular(Str::studly(class_basename($this->argument('name'))));

		$this->call('nexus:resource-model', [
			'name' => $model,
			'--force',
		]);
	}

	public function createAndAssignPermissions()
	{
		$route = Str::plural(Str::snake(class_basename($this->argument('name'))));

		$abilities = [
			AuthorizeAction::View,
			AuthorizeAction::Add,
			AuthorizeAction::Edit,
			AuthorizeAction::Delete,
		];

		$permissions = [];

		foreach ($abilities as $ability) {
			$permissions[] = [
				'name' => $ability . '_' . $route,
				'guard_name' => 'admin',
			];
		}

		// Create new permissions
		Permission::insert($permissions);

		// Asign to Developer Role
		(Role::findByName(dev_role(), 'admin'))->syncPermissions(Permission::all());
	}

	protected function getStub($type)
	{
		return resource_path() . "stubs/resource/{$type}.stub";
	}

	protected function model($name)
	{
		$template = str_replace(
			['{{modelName}}'],
			[$name],
			$this->getStub('Model')
		);

		file_put_contents(app_path("/{$name}.php"), $modelTemplate);
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
