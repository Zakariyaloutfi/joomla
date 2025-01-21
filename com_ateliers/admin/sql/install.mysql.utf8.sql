CREATE TABLE IF NOT EXISTS `#__ateliers` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `date_time` DATETIME NOT NULL,
    `date` DATETIME NOT NULL,
    `places_totales` INT(11) NOT NULL DEFAULT 0,
    `places_reservees` INT(11) NOT NULL DEFAULT 0,
    `prix` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `published` TINYINT(1) NOT NULL DEFAULT 1,
    `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by` INT(11) NOT NULL DEFAULT 0,
    `modified` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    `modified_by` INT(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
