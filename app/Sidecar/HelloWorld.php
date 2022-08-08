<?php

namespace App\Sidecar;

use Hammerstone\Sidecar\LambdaFunction;
use Hammerstone\Sidecar\Runtime;

class HelloWorld extends LambdaFunction
{
	public function handler()
	{
		return 'sidecar/index@handler';
	}

	public function package()
	{
		return [
			'sidecar/index.py'
		];
	}

	public function runtime()
	{
		return Runtime::PYTHON_39;
	}
}