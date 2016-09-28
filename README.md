#Site de Qcm
===
Projet de fin d'année de mon certificat de développeur web au CNAM

Contexte
---
Les qcm sont réalisés par des professeurs pour des élèves afin de les évaluer. Il y a donc deux accès.
Les technologies pour ce projets sont : php, bootstrap, html, css, ajax
Architecture MVC

Comments
---
Une grosse partie de mon temps pour ce projet a été consacré à la réflexion en amont des fonctionnalités de ce site. Comment il devait être construit et ce qu'il devait apporté. J'essaye d'imaginer tout ce que j'ai à faire et à écrire pour réaliser ce projet. Une fois cette feuille de route faite, je vais plus vite, je sais ce que j'ai à faire… Je vous invite à la lire : FeuilleDeRoute.txt 

La deuxième grosse partie a été conception de la base de donnée sql.

Pour "automatiser" un peu l'écriture, j'ai créer des fonctions servant à créer des formulaires voir makeform.php et son utilisation dans creerQuestion.php, ajouterQcm.php par exemple

For testing
---
Pour accéder au site, vous pouvez créer un utilisateur ou utiliser l'un de ceux là : 

	Satut		Nom		Mail				Mot de passe
	Professeur	Prof	prof__at__demo.com	php
	Etudiant	Paul	Paul__at__demo.com	php
	Etudiant	Emma	Emma__at__demo.com	php


Fonctionnalités du programme :
---
		Connexion
		Déconnexion
		(Création de compte)
		Menu Enseignant
			Créer des question
			Voir des questions
			Générer des qcm
			Voir les notes des éleves
			Voir les notes par Qcm
		Menu Eleve
			Liste des Qcm
			Qcm en attente
			consulter ses Notes
					


View Demo
---
http://v.velitch.free.fr/


Contribute / Contact
---
Feel free to send pull requests.
You can contact me on github.


License
---
None
