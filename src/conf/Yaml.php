<?php

namespace Wooletthedevsout\Config;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Yaml implements ConfigInterface
{
	protected $file = './wc-config.yml';

	protected $data;

	protected $processor;

	public function __construct(\Wooletthedevsout\Config\Processor $processor)
	{
		$this->processor = $processor;
		$this->parse();
	}

	protected function parse()
	{
		try { 

			$data = Yaml::parse($this->file);
			$this->data = $data;

		} catch (ParseException $exception) {

		    printf(
		    	'Unable to parse the YAML string: %s', 
		    	$exception->getMessage()
		    );
		}

		return $this;
	}

	protected function process()
	{
		$this->processor->setData($this->data);
		$this->processor->run();
	}

	public function getConfig(string|array|null $options)
	{
		return $this->data;
	}
}