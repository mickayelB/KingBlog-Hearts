<?php

class UserSessionFilter implements InterceptingFilter
{
	public function run(Http $http, array $queryFields, array $formFields)
	{
		return [
    	'userSession' => new UserSession()
    ];
    // Le filtre va faire en sorte de rentre disponible dans toutes les vues de l'app une variable userSession qui
    // correspond à une instance de la classe UserSession
	}
}
