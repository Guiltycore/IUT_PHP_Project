<?php

	class Conf
	{
		static private $debug = TRUE;

		static private $databases = [
			'hostname' => 'guiltycore.fr' ,
			'database' => 'eCommerce' ,
			'login'    => 'eCommerce' ,
			'password' => 'ecommerce' ,
			'port'     => '3306'    ,
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