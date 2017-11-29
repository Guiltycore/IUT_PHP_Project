<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:38
	 */
	echo "
	<h1>Information du compte:</h1>
	<div>
	Login:{$u->getLogin()}<br>
	Nom:{$u->getNom()}<br>
	Prenom:{$u->getPrenom()}<br>
	Adresse:{$u->getAdresse()}<br>
	
	Mail:{$u->getMail()}<br>
	Status:";
	if($u->getAdmin()){
		echo "Admin";
	}
	else{
		echo "Utilisateur";
	}
	echo "</div>";
	echo "	<h3>Action:</h3><div>
	<ul>
	<li><a href='index?action=update&controller=utilisateur'>Modifier mon compte</a></li>
	<li><a href='index?action=delete&controller=utilisateur&login=".$u->getLogin()."'>DELETE</a></li>
</ul>
	
</div>"

?>