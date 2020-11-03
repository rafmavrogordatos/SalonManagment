CREATE TABLE `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  'nameofSalon' varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `homeadress` varchar(255) NOT NULL,
  `home_num` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `tax_office` varchar(255) NOT NULL,
  `vat_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `clients` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  'firstname' varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `homeadress` varchar(255) NOT NULL,
  `home_num` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `giorti` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `referredby` varchar(255) NOT NULL,
  `isKiniti` varchar(255) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `clients_history` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  'firstname' varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `homeadress` varchar(255) NOT NULL,
  `home_num` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `giorti` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `referredby` varchar(255) NOT NULL,
  `isKiniti` varchar(255) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
