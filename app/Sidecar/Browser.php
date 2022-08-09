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
	 * The architecture appears as:
	 * 
	 * 
	 * Our code
	 * ^------------------------
	 * Chrome AWS Lambda layer
	 * ^------------------------
	 * Runtime (Node)
	 * ^------------------------
	 * 
	 * While using layers there is no need to use NODE_MODULES
	 * in our lambda function since they are already added 
	 * ontop of our runtime. 
	 * ie, we can delete node_modules,package.json, ...
	 * 
	 * 
	 * */

	public function layers()
	{
		return [
			'arn:aws:lambda:us-east-2:764866452798:layer:chrome-aws-lambda:31'
		];
	}
}