CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `license_plate` varchar(8) NOT NULL,
  `renavam` varchar(30) DEFAULT NULL,
  `model` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

ALTER TABLE
  `drivers`
ADD
  PRIMARY KEY (`id`);

ALTER TABLE
  `vehicles`
ADD
  PRIMARY KEY (`id`);

ALTER TABLE
  `drivers`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

ALTER TABLE
  `vehicles`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

COMMIT;