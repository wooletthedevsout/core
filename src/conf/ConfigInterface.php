<?php

namespace Wooletthedevsout\Config;

interface ConfigInterface
{
	protected function parse();

	protected function process();

	public function getConfig($options);
}