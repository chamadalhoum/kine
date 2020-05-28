<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200428035324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, nom_pathologie VARCHAR(255) DEFAULT NULL, prix_min DOUBLE PRECISION DEFAULT NULL, prix_max DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) DEFAULT NULL, CHANGE role_date_creation role_date_creation DATETIME DEFAULT NULL, CHANGE role_etat role_etat VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_prenom user_prenom VARCHAR(255) DEFAULT NULL, CHANGE user_email user_email VARCHAR(255) DEFAULT NULL, CHANGE user_adresse user_adresse VARCHAR(255) DEFAULT NULL, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) DEFAULT NULL, CHANGE user_datenaissance user_datenaissance DATE DEFAULT NULL, CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) DEFAULT NULL, CHANGE roles roles VARCHAR(255) NOT NULL, CHANGE user_nom user_nom VARCHAR(255) DEFAULT NULL, CHANGE user_password user_password VARCHAR(255) DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE prestation');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE role_date_creation role_date_creation DATETIME DEFAULT \'NULL\', CHANGE role_etat role_etat VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE user_nom user_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_prenom user_prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_email user_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_password user_password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_adresse user_adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE user_datenaissance user_datenaissance DATE DEFAULT \'NULL\', CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
