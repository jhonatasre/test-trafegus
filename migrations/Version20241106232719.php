<?php

declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106232719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criando tabela de veículos';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, license_plate VARCHAR(8) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, renavam VARCHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, model VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, brand VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, year INT NOT NULL, color VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE vehicles');
    }
}
