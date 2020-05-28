<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200402010927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_nom VARCHAR(255) DEFAULT NULL, user_prenom VARCHAR(255) DEFAULT NULL, user_email VARCHAR(255) DEFAULT NULL, user_password VARCHAR(255) DEFAULT NULL, user_adresse VARCHAR(255) DEFAULT NULL, user_tel INT DEFAULT NULL, user_sex VARCHAR(255) DEFAULT NULL, user_datenaissance DATE DEFAULT NULL, user_cin INT DEFAULT NULL, user_matriculecnss VARCHAR(255) DEFAULT NULL, user_role VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
    }
}
