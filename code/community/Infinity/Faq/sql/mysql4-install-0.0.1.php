<?php

$installer = $this;

$installer->startSetup();

$installer->run("
		
		DROP TABLE IF EXISTS {$this->getTable('faq')};
		CREATE TABLE {$this->getTable('faq')} (
			  'faq_id' int(11) NOT NULL,
			  'question' varchar(255) NOT NULL DEFAULT '',
			  'answer' varchar(3000) NOT NULL DEFAULT '',
			  'status' smallint(6) NOT NULL DEFAULT '0',
			  'created_time' datetime DEFAULT NULL,
			  'update_time' datetime DEFAULT NULL,
			  'views' int(11) DEFAULT '0',
			  'helpful_count' int(11) DEFAULT '0',
			  'not_helpful_count' int(11) DEFAULT '0',
			  PRIMARY KEY ('faq_id')
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
		LOCK TABLES {$this->getTable('faq')} WRITE;

		INSERT INTO {$this->getTable('faq')} VALUES (0,'How do you use the Infinity FAQ extension?','Using the Infinity FAQ extension is very simple.\r\n\r\nEach FAQ question is created in the FAQ \'Manage Items\' section, including this one.\r\n\r\nYou can also enable and disable all of the FAQ extensions functions in the config section.\r\n\r\nFeel free to delete th',1,'2013-06-04 13:02:14','2013-06-04 13:02:14',57,7),(1,'How do I get in contact with Infinity FAQ\'s developers?','You can easily get in touch with the developers of the Infinity FAQ extension by email matt.gribben@gmail.com',1,'2013-06-04 13:03:22','2013-06-04 13:03:22',10,5);
			
		DROP TABLE IF EXISTS {$this->getTable('config')};
		CREATE TABLE {$this->getTable('config')} (
			  'config_id' int(11) NOT NULL,
			  'title' varchar(45) DEFAULT NULL,
			  'faq_url' varchar(45) DEFAULT NULL,
			  'subtitle' varchar(45) DEFAULT NULL,
			  'status' smallint(2) DEFAULT NULL,
			  'ask' smallint(2) DEFAULT NULL,
			  'rating' smallint(2) DEFAULT NULL,
			  'showrating' smallint(2) DEFAULT NULL,
			  PRIMARY KEY ('config_id')
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
			
		LOCK TABLES {$this->getTable('config')} WRITE;

		INSERT INTO {$this->getTable('config')} VALUES (0,NULL,'faq/',NULL,1,1,1,1);
		
		DROP TABLE IF EXISTS {$this->getTable('submitted')};
		CREATE TABLE `infinity_faq_submitted` (
			  'submitted_id' int(11) NOT NULL,
			  'name' varchar(45) DEFAULT NULL,
			  'question' varchar(3000) DEFAULT NULL,
			  PRIMARY KEY ('submitted_id')
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		
		");

$installer->endSetup();