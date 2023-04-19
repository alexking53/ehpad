-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 mars 2023 à 05:20
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memoryv1`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `NUMERO` smallint(1) NOT NULL,
  `LOGIN` char(32) NOT NULL,
  `DUREE` datetime NOT NULL,
  `IDENTIFIANT` int(2) NOT NULL,
  `VALEUR` int(2) DEFAULT NULL,
  `STATUT` tinyint(1) DEFAULT NULL,
  `TITRE` char(255) DEFAULT NULL,
  `CHEMINIMAGEDOS` char(255) DEFAULT NULL,
  `CHEMINIMAGEFACE` char(255) DEFAULT NULL,
  `NUMCOLPLATEAU` int(2) DEFAULT NULL,
  `NUMRANGPLATEAU` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUMERO`,`LOGIN`,`DUREE`,`IDENTIFIANT`),
  KEY `I_FK_CARTE_PARTIE` (`NUMERO`,`LOGIN`,`DUREE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `NUMERO` int(2) NOT NULL AUTO_INCREMENT,
  `LIBELE` varchar(100) NOT NULL,
  PRIMARY KEY (`NUMERO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`NUMERO`, `LIBELE`) VALUES
(1, 'décès'),
(2, 'plateau repas'),
(3, 'jeu'),
(4, 'motricité'),
(5, 'sortie'),
(6, 'illectronisme'),
(7, 'ménage'),
(8, 'télésurveillance');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `LOGIN` char(32) NOT NULL,
  `NOM` varchar(100) DEFAULT NULL,
  `PRENOM` varchar(100) DEFAULT NULL,
  `RUE` varchar(255) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TEL` varchar(15) DEFAULT NULL,
  KEY `LOGIN` (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`LOGIN`, `NOM`, `PRENOM`, `RUE`, `CP`, `VILLE`, `EMAIL`, `TEL`) VALUES
('test@test1.fr', 'durand', 'pascalinoise', '35, rue Jean Olivier', '53000', 'Laval', 'test@test1.fr', '0299147589'),
('pascaline9', 'Michelle', 'sq', 'sqs', '53000', 'sqs', 'sqsq@sqsq.fr', '024589626');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NOCOMMANDE` int(4) NOT NULL AUTO_INCREMENT,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LOGIN` char(32) NOT NULL,
  `TOTAL` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`NOCOMMANDE`),
  KEY `LOGIN` (`LOGIN`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NOCOMMANDE`, `DATE`, `LOGIN`, `TOTAL`) VALUES
(1, '2023-02-24 00:55:52', 'test@test1.fr', 298.80),
(12, '2023-02-26 21:24:21', 'pascaline9', 298.80);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `IDENTIFIANT` int(3) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `TITRE` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `LOGIN` char(32) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`IDENTIFIANT`),
  KEY `LOGIN` (`LOGIN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`IDENTIFIANT`, `EMAIL`, `TITRE`, `DESCRIPTION`, `LOGIN`) VALUES
(1, 'hhh', 'tt', 'hhh', 'admin'),
(2, 'tester@bts.fr', 'Test', 'Hello', 'admin'),
(3, 'tester@bts.fr', 'Test', 'Hello', 'admin'),
(4, 'tester@bts.fr', 'Test', 'Hello', 'admin'),
(5, 'sqsq@sqsq.fr', 'sqsq', 'sqsq', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `IDENTIFIANT` int(1) NOT NULL AUTO_INCREMENT,
  `LIBELE` varchar(50) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`IDENTIFIANT`, `LIBELE`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `REFERENCE` int(3) NOT NULL,
  `NOCOMMANDE` int(4) NOT NULL,
  `QTITE` int(5) NOT NULL,
  PRIMARY KEY (`REFERENCE`,`NOCOMMANDE`),
  KEY `NUMERO` (`REFERENCE`,`NOCOMMANDE`),
  KEY `NOCOMMANDE` (`NOCOMMANDE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`REFERENCE`, `NOCOMMANDE`, `QTITE`) VALUES
(1, 1, 1),
(1, 12, 1);

--
-- Déclencheurs `lignecommande`
--
DROP TRIGGER IF EXISTS `majCommande`;
DELIMITER $$
CREATE TRIGGER `majCommande` BEFORE INSERT ON `lignecommande` FOR EACH ROW BEGIN
SELECT service.PRIX into @prix FROM service WHERE service.REFERENCE=NEW.REFERENCE;

UPDATE commande SET commande.TOTAL = (commande.TOTAL + @prix) WHERE commande.NOCOMMANDE=NEW.NOCOMMANDE;

UPDATE service SET service.STOCK = (service.STOCK -NEW.QTITE) WHERE service.REFERENCE = NEW.REFERENCE;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `NUMERO` smallint(1) NOT NULL,
  `NBRETOTALCARTE` smallint(2) DEFAULT NULL,
  `NBRECARTECOTE` smallint(2) DEFAULT NULL,
  `DIMENSION` int(6) DEFAULT NULL,
  PRIMARY KEY (`NUMERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`NUMERO`, `NBRETOTALCARTE`, `NBRECARTECOTE`, `DIMENSION`) VALUES
(1, 4, 2, 300),
(2, 16, 4, 150),
(3, 36, 6, 100);

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `NUMERO` smallint(1) NOT NULL,
  `LOGIN` char(32) NOT NULL,
  `DUREE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NBRECLIC` char(32) DEFAULT '0',
  `STATUT` enum('En cours','Fini') DEFAULT 'En cours',
  PRIMARY KEY (`NUMERO`,`LOGIN`,`DUREE`),
  KEY `I_FK_PARTIE_PERSONNE` (`LOGIN`),
  KEY `I_FK_PARTIE_NIVEAU` (`NUMERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `partie`
--
DROP TRIGGER IF EXISTS `InterdireModificationPartieFini`;
DELIMITER $$
CREATE TRIGGER `InterdireModificationPartieFini` BEFORE UPDATE ON `partie` FOR EACH ROW BEGIN
if old.STATUT = "Fini" THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Opération non autorisée';
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `LOGIN` char(32) NOT NULL,
  `MDP` char(32) DEFAULT NULL,
  `DROIT` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`LOGIN`),
  KEY `DROIT` (`DROIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`LOGIN`, `MDP`, `DROIT`) VALUES
('admin', 'admin', 1),
('pascaline9', '123456', 2),
('test@test1.fr', 'test', 2);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `REFERENCE` int(3) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(100) NOT NULL,
  `RESUME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRIX` decimal(6,2) DEFAULT NULL,
  `PHOTO` varchar(255) NOT NULL,
  `STOCK` int(4) NOT NULL,
  `CAT` int(2) NOT NULL,
  PRIMARY KEY (`REFERENCE`),
  KEY `CAT` (`CAT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`REFERENCE`, `TITRE`, `RESUME`, `DESCRIPTION`, `PRIX`, `PHOTO`, `STOCK`, `CAT`) VALUES
(1, 'Téléassistance à domicile', '24,90 € / mois\r\n<br>\r\nSoit 12,45 € / mois après crédit d\'impôt', '<h3 class=\"col-12\">Notre offre de téléassistance à domicile</h3>\r\n<p class=\"col-12\">La Téléalarme Initiale est une offre de téléassistance à un prix abordable, pour toute personne en perte d’autonomie et désirant rester chez soi. L’offre de Téléassistance Initiale coûte 24,90 € par mois, soit 12,45 € par mois après crédit d’impôt. Sentez-vous rassuré et protégé à votre domicile, grâce à ce médaillon, qui vous permettra d’être en contact avec un chargé d’écoute et d’assistance qui alertera les proches ou les secours si nécessaire, et cela 24 h / 24 et 7 j / 7.</p>\r\n<h3 class=\"col-12\">téléassistance bip bracelet et collier</h3>\r\n<p class=\"col-12\">Abonnement sans engagement de durée et sans frais de résiliation\r\nL’abonnement de la Téléassistance Initiale est résiliable à tout moment. Il n’y a pas de préavis à respecter, il suffit de retourner le matériel dans un colis, à notre cellule de résiliation et celle-ci est effective à la réception du matériel.</p>\r\n<h3 class=\"col-12\">Comment obtenir la Téléassistance Initiale ?</h3>\r\n<p class=\"col-12\">Il suffit de commander ce service. Un technicien vous installera le produit et remplira avec vous l\'adhésion. Pour s’abonner, vous devrez avoir à votre disposition, les contacts de vos proches, ainsi que vos coordonnées bancaires, pour la mise en place du prélèvement mensuel. Un technicien intervient sous 7 jours ouvrés, sans frais, et il n’y a pas d’âge minimum ou maximum.  Vous avez le droit jusqu’à 4 contacts.</p>', '298.80', 'teleassistance-classique-a-declenchement-manuel.jpg', 94, 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `carte_ibfk_1` FOREIGN KEY (`NUMERO`,`LOGIN`,`DUREE`) REFERENCES `partie` (`NUMERO`, `LOGIN`, `DUREE`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `personne` (`LOGIN`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `client` (`LOGIN`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `personne` (`LOGIN`);

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `lignecommande_ibfk_1` FOREIGN KEY (`NOCOMMANDE`) REFERENCES `commande` (`NOCOMMANDE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignecommande_ibfk_2` FOREIGN KEY (`REFERENCE`) REFERENCES `service` (`REFERENCE`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `personne` (`LOGIN`) ON DELETE CASCADE,
  ADD CONSTRAINT `partie_ibfk_2` FOREIGN KEY (`NUMERO`) REFERENCES `niveau` (`NUMERO`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`DROIT`) REFERENCES `droit` (`IDENTIFIANT`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`CAT`) REFERENCES `categorie` (`NUMERO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
