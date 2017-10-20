<?php

	class Conf
	{
		static private $debug = TRUE;

		static private $databases = [
			'hostname' => 'db705681969.db.1and1.com' ,
			'database' => 'db705681969' ,
			'login'    => 'dbo705681969' ,
			'password' => 'Gh;]Yv<ZKM_87^%E' ,
			'port'     => '3306',
		];

		static public function getLogin ()
		{
			//in PHP, indices of arrays car be strings (or integers)
			return self ::$databases[ 'login' ];
		}

		static public function getHostname ()
		{
			return self ::$databases[ 'hostname' ];
		}

		static public function getDatabase ()
		{
			return self ::$databases[ 'database' ];
		}

		static public function getPassword ()
		{
			return self ::$databases[ 'password' ];
		}

		static public function getDebug ()
		{
			return self ::$debug;
		}

		static public function getPort ()
		{
			return self ::$databases[ 'port' ];
		}
	}

?>