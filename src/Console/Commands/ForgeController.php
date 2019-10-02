<?php

namespace Pandorga\Nexus\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class ForgeController extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'nexus:controller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Forge a new controller class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

    /**
     * Execute the console command.
     *
     * @return bool|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $name = $this->qualifyClass($this->getNameInput());

    	$pluralBaseClass = Str::plural(Str::studly(class_basename($name)));
        $path = $this->getPath($this->qualifyClass("{$pluralBaseClass}Controller"));

        // First we will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((! $this->hasOption('force') ||
             ! $this->option('force')) &&
             $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name));

        $this->info($this->type.' created successfully.');
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

        // Extract first dash for class namespace
        $baseNamespace = preg_replace('/\\\/', '', config('nexus.route.namespace'), 1);

        $substitutions = [
            'ClassNamespace'             => $baseNamespace,
            'SingularBaseClass'          => $singularBaseClass,
            'PluralBaseClass'            => $pluralBaseClass,
            'SingularLowercaseBaseClass' => $singularLowercaseBaseClass,
            'PluralLowercaseBaseClass'   => $pluralLowercaseBaseClass,
            'PluralSnakeBaseClass'       => $pluralSnakeBaseClass,
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
        return package_path('resources/stubs/resource/DummyController.stub');
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\Http\Controllers\Backend';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the Controller.'],
        ];
    }
}
