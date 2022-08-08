<?php

namespace App\Sidecar;

use Hammerstone\Sidecar\LambdaFunction;
use Hammerstone\Sidecar\Package;


/**
 * Exploring chrome on  https://github.com/alixaxel/chrome-aws-lambda
 * 
 */

class Browser extends LambdaFunction
{

	public function handler()
	{
		return 'index@handler';
	}


	public function package()
	{

		return Package::make()
			->setBasePath('sidecar/browser')
			->include('*');
		
	}

	public function memory()
	{
		return 2048;
	}

	/**
	 * List of layers supported:  
	 * https://github.com/mthenw/awesome-layers
	 * 
	 * */

	public function layers()
	{
		return [
			'arn:aws:lambda:us-east-1:764866452798:layer:chrome-aws-lambda:4'
		];
	}
}