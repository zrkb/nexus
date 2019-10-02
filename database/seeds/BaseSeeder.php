<?php

namespace Pandorga\Nexus\Database\Seeds;

use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder
{
	public function seedFromJson($jsonFilePath, $model, $closure = null)
	{
		$jsonData = File::get(database_path($jsonFilePath));
		$object = (json_decode($jsonData, true));

		if ($closure) {
			$data = array_map(function($key, $item) use ($closure) {
				return $closure($item);
			}, array_keys($object), $object);
		}

		$data = array_map(function($key, $item) use ($model) {
			$model::create($item);
		}, array_keys($data), $data);

		$this->command->line(sprintf('<info>Table (%s):</info> %d rows affected', $model, count($data)));
	}
}
