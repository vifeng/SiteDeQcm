-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 01 Septembre 2016 à 19:00
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

-- --------------------------------------------------------

--
-- Contenu de la table `FAITQCM`
--

INSERT INTO `FAITQCM` (`idFaitQcm`, `idQcm`, `DateLimite`, `idQuestion`) VALUES
(1, 1, '2016-06-06', 1),
(2, 1, '2016-06-06', 3),
(3, 1, '2016-06-06', 5),
(4, 2, '2016-08-07', 6),
(5, 2, '2016-08-07', 7),
(6, 2, '2016-08-07', 8),
(7, 2, '2016-08-07', 9),
(8, 2, '2016-08-07', 10),
(9, 3, '2016-09-14', 8),
(10, 3, '2016-09-14', 9),
(11, 6, '2016-07-13', 11),
(12, 6, '2016-07-13', 12),
(13, 6, '2016-07-13', 14),
(14, 6, '2016-07-13', 15),
(15, 6, '2016-07-13', 16),
(16, 7, '2016-06-14', 15),
(17, 7, '2016-06-14', 16),
(18, 8, '2016-07-21', 5),
(19, 8, '2016-07-21', 17);

-- --------------------------------------------------------

--
-- Contenu de la table `QCM`
--

INSERT INTO `QCM` (`idQcm`, `TitreQcm`, `idTheme`) VALUES
(1, 'php1', 1),
(2, 'HTML 1 5questions', 3),
(3, 'HTML 2 2questions', 3),
(4, 'HTML 3 5questions', 5),
(5, 'jquery', 1),
(6, 'javascript difficulté moyenne', 2),
(7, 'Javascript 2 questions', 2),
(8, 'Avec Hervé', 1);

-- --------------------------------------------------------
--
-- Contenu de la table `Question`
--

INSERT INTO `Question` (`idQuestion`, `Question`, `idProf`, `idTheme`) VALUES
(1, 'Que signifie PHP ?', 2, 1),
(2, 'Quelle fonction retourne la longueur d''une chaîne de texte ?', 2, 1),
(3, 'Comment accède-t-on au 1er élément chaton dans le tableau suivant : $tableau = Array(''chaton'' , ''ornithorynque'', ''dauphin''); ?', 2, 1),
(4, 'Comment vérifie-t-on l''égalité de deux variables : $a et $b ?', 2, 1),
(5, 'Quelle est l''utilité de l''opérateur || ?', 2, 1),
(6, 'Quel est le doctype d''un document HTML5 ?', 2, 3),
(7, 'Quelle est la syntaxe pour déclarer l''encodage des caractères du document en UTF-8 ?', 2, 3),
(8, 'Quelle nouvelle balise de section permet de regrouper un contenu tangentiel au contenu principal du document ?', 2, 3),
(9, 'La nouvelle balise <time> permet de baliser une date structurée. Quelle serait sa syntaxe pour le 1er avril 2012 à 13h37 ?', 2, 3),
(10, 'À partir de quelle version d''Internet Explorer peut-on utiliser nativement les éléments de section HTML5 (sans hack ou script complémentaire) ?', 2, 3),
(11, 'Quels sont les types de nombres définis en JavaScript ?', 2, 2),
(12, 'Que signifie l''acronyme AJAX ?', 2, 2),
(14, 'Quel est l''équivalent pour un noeud de l''arbre DOM de  node.childNodes[1] (en supposant que le noeud demandé existe) ?', 2, 2),
(15, 'Quelle syntaxe est correcte pour que la fonction init soit appelée au chargement de la page ?', 2, 2),
(16, 'Quand l''événement "load" se déclenche-t-il pour une page ?', 2, 2),
(17, 'Lequel des tableaux suivants est-il associatif ? ', 2, 1);

-- --------------------------------------------------------

--
-- Contenu de la table `Reponse`
--

INSERT INTO `Reponse` (`idReponse`, `idQuestion`, `reponse`, `statutReponse`, `idTheme`) VALUES
(1, 1, 'Page Helper Process', '0', 1),
(2, 1, 'Programming Home Pages', '0', 1),
(3, 1, 'PHP: Hypertext Preprocessor', '1', 1),
(4, 2, 'strlen', '1', 1),
(5, 2, 'strlength', '0', 1),
(6, 2, 'length', '0', 1),
(7, 3, '$tableau[1]', '0', 1),
(8, 3, '$tableau[0]', '1', 1),
(9, 3, '$tableau{0}', '0', 1),
(10, 4, '$a == $b', '0', 1),
(11, 4, '$a = $b', '1', 1),
(12, 4, '$a != $b', '0', 1),
(13, 5, 'Il sert à vérifier que toutes les conditions sont réalisées.', '0', 1),
(14, 5, 'Il sert à vérifier qu''une, et une seule, des conditions est réalisée.', '0', 1),
(15, 5, 'Il sert à vérifier qu''une, au moins, des conditions est réalisée.', '1', 1),
(16, 6, '<!DOCTYPE html5>', '0', 3),
(17, 6, '<!DOCTYPE html>', '1', 3),
(18, 6, '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML5.0 Strict//EN">', '0', 3),
(19, 7, '<meta encoding="text/html; charset=utf-8">', '0', 3),
(20, 7, '<meta charset="text/html; UTF-8">', '0', 3),
(21, 7, '<meta charset="utf-8">', '1', 3),
(22, 8, '<section id="sidebar">', '0', 3),
(23, 8, '<sidebar>', '0', 3),
(24, 8, '<aside>', '1', 3),
(25, 9, '<time datetime="2012-04-01T13:37:00Z"></time>', '1', 3),
(26, 9, '<time value="2012-04-01 13:37"></time>', '0', 3),
(27, 9, '<time datetime="01/04/2012 13H37M00S"></time>', '0', 3),
(28, 10, 'Internet Explorer 8', '0', 3),
(29, 10, 'Internet Explorer 9', '1', 3),
(30, 10, 'Internet Explorer 10', '0', 3),
(31, 11, 'Integer et Float', '0', 2),
(32, 11, 'Number', '1', 2),
(33, 11, 'Number et Double', '0', 2),
(34, 12, 'Asynchronous JavaScript and XML', '1', 2),
(35, 12, 'Advanced JavaScript with XMLHttpRequest', '0', 2),
(36, 12, 'JavaScript extensible', '0', 2),
(37, 14, 'node.firstChild', '0', 2),
(38, 14, 'node.previousSibling.parentNode', '0', 2),
(39, 14, 'node.firstChild.nextSibling', '1', 2),
(40, 15, 'window.onload = init;', '1', 2),
(41, 15, 'window.onload = init();', '0', 2),
(42, 15, 'window.onload() = init;', '0', 2),
(43, 16, 'Dès que le navigateur commence à recevoir le code HTML.', '0', 2),
(44, 16, 'Quand l''arbre DOM a été construit', '0', 2),
(45, 16, 'Quand l''arbre DOM a été construit et toutes les ressources chargées (images, ...)', '1', 2),
(46, 17, 'a$[] = "toto"', '0', 1),
(47, 17, 'a$ = array("toto")', '0', 1),
(48, 17, 'a$ = array("nom"=>"toto")', '1', 1);

-- --------------------------------------------------------

--
-- Contenu de la table `Resultat`
--

INSERT INTO `Resultat` (`idEleve`, `idQcm`, `idReponse`, `points`) VALUES
(3, 6, 32, 1),
(3, 6, 34, 1),
(3, 6, 38, 0),
(3, 6, 41, 0),
(3, 6, 42, 0),
(3, 6, 43, 0),
(3, 8, 13, 0),
(3, 8, 15, 1),
(3, 8, 47, 0),
(3, 8, 48, 1),
(4, 3, 24, 1),
(4, 3, 25, 1),
(4, 7, 40, 1),
(4, 7, 41, 0),
(4, 7, 43, 0);

-- --------------------------------------------------------

--
-- Contenu de la table `Statut`
--

INSERT INTO `Statut` (`idStatut`, `statut`) VALUES
(1, 'Prof'),
(2, 'Etudiant');

-- --------------------------------------------------------

--
-- Contenu de la table `Theme`
--

INSERT INTO `Theme` (`idTheme`, `theme`) VALUES
(4, 'css'),
(3, 'html'),
(6, 'java'),
(2, 'javascript'),
(5, 'jquery'),
(1, 'php');

-- --------------------------------------------------------

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`idUser`, `nom`, `prenom`, `mail`, `login`, `motdepasse`, `idStatut`) VALUES
(2, 'Prof1', 'josé', 'Prof@demo.com', 'jose', 'php', 1),
(3, 'Eleve1', 'Paul', 'Paul@demo.com', 'paul', 'php', 2),
(4, 'Eleve2', 'Emma', 'Emma@demo.com', 'Emma', 'php', 2);

