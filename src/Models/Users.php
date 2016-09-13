<?php
//Users Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent
{
	private $id;
	private $prenom;
	private $nom;
	private $pseudo;
    private $mail;
    private $mdp;
}