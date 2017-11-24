<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 06/10/17
	 * Time: 10:07
	 */
	include __DIR__.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'File.php';
	include File::build_path (['lib','Security.php']);
	include File::build_path (['lib','Session.php']);
	require File::build_path (array ('controller','routeur.php'));

?>