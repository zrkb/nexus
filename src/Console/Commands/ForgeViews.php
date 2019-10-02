<?php

namespace Nexus\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ForgeViews extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'nexus:views {name} {--i|icon=smile}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Forge view resource for crud operations';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'View';

	/**
	 * Execute the console command.
	 *
	 * @return bool|null
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
	public function handle()
	{
		$name = $this->getNameInput();

		foreach ($this->getViews() as $view) {
			$this->createViewFile($view, $name);
		}
	}

	public function createViewFile($filename, $name)
	{
        $snakeName = Str::snake(Str::plural(class_basename($name)));
		$path = resource_path("views/{$snakeName}/{$filename}.blade.php");

		// Next, we will generate the path to the location where this class' file should get
		// written. Then, we will build the view and make the proper replacements on the
		// stub files so that it gets the correctly variables
		$this->makeDirectory($path);

		$this->files->put($path, $this->buildView($filename, $name));

		$this->info($this->type . " {$filename}.blade.php created successfully.");
	}

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildView($filename, $name)
    {
        $stub = $this->files->get($this->getViewStub($filename));

        return $this->replaceClass($stub, $name);
    }

	/**
	 * Replace the class name for the given stub.
	 *
	 * @param  string  $stub
	 * @param  string  $name
	 * @return string
	 */
	protected function replaceClass($stub, $name)
	{
		$singularBaseClass          = Str::singular(Str::studly(class_basename($name)));
		$pluralBaseClass            = Str::plural(Str::studly(class_basename($name)));
		
		$singularLowercaseBaseClass = Str::camel($singularBaseClass);
		$pluralLowercaseBaseClass   = Str::camel($pluralBaseClass);
        $pluralSnakeBaseClass       = Str::snake($pluralBaseClass);

		$stub = parent::replaceClass($stub, $name);

		$substitutions = [
			'SingularBaseClass'          => $singularBaseClass,
			'PluralBaseClass'            => $pluralBaseClass,
			'SingularLowercaseBaseClass' => $singularLowercaseBaseClass,
			'PluralLowercaseBaseClass'   => $pluralLowercaseBaseClass,
            'PluralSnakeBaseClass'       => $pluralSnakeBaseClass,
			'BoxIcon'                => $this->option('icon'),
		];

		return str_replace(array_keys($substitutions), array_values($substitutions), $stub);
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return resource_path() . '/stubs/resource/views/index.blade.stub';
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getViewStub($type)
	{
        return package_path("resources/stubs/resource/views/{$type}.blade.stub");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of the view resource.'],
		];
	}

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['icon', null, InputOption::VALUE_OPTIONAL, 'The name of the icon.', 'command:name'],
        ];
    }

	protected function getViews()
	{
		return [
			'create',
			'edit',
			'form',
			'index',
			'show',
		];
	}
}
