<?php

namespace App\Jobs;

class TestAction
{
	static function getData()
	{
		sleep(15);
		info("getDataSuccess");
	}
}
