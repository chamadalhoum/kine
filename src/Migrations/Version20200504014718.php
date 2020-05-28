<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200504014718 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, num_fac VARCHAR(255) DEFAULT NULL, montant_paye DOUBLE PRECISION DEFAULT NULL, montant_reste DOUBLE PRECISION DEFAULT NULL, nb_seance INT DEFAULT NULL, nom_patologie VARCHAR(255) NOT NULL, total DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendezvous (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, heure DATETIME DEFAULT NULL, duree TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article CHANGE fournisseur_id fournisseur_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE detail detail VARCHAR(255) DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE date date DATETIME DEFAULT NULL, CHANGE id_cabinet id_cabinet INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employe ADD employe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B91B65292 FOREIGN KEY (employe_id) REFERENCES rendezvous (id)');
        $this->addSql('CREATE INDEX IDX_F804D3B91B65292 ON employe (employe_id)');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matriel CHANGE nom nom DOUBLE PRECISION DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD patient_id INT DEFAULT NULL, ADD patientfacture_id INT DEFAULT NULL, CHANGE compagnant compagnant VARCHAR(255) DEFAULT NULL, CHANGE numero_fiche numero_fiche VARCHAR(255) DEFAULT NULL, CHANGE assurance assurance VARCHAR(255) DEFAULT NULL, CHANGE code_cnam code_cnam VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB6B899279 FOREIGN KEY (patient_id) REFERENCES rendezvous (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB943A9D2A FOREIGN KEY (patientfacture_id) REFERENCES facture (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB6B899279 ON patient (patient_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB943A9D2A ON patient (patientfacture_id)');
        $this->addSql('ALTER TABLE prestation CHANGE nom_pathologie nom_pathologie VARCHAR(255) DEFAULT NULL, CHANGE prix_min prix_min DOUBLE PRECISION DEFAULT NULL, CHANGE prix_max prix_max DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE tva tva INT DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) DEFAULT NULL, CHANGE role_date_creation role_date_creation DATETIME DEFAULT NULL, CHANGE role_etat role_etat VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT DEFAULT NULL, CHANGE user_patient_id user_patient_id INT DEFAULT NULL, CHANGE user_prenom user_prenom VARCHAR(255) DEFAULT NULL, CHANGE user_email user_email VARCHAR(255) DEFAULT NULL, CHANGE user_adresse user_adresse VARCHAR(255) DEFAULT NULL, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) DEFAULT NULL, CHANGE user_datenaissance user_datenaissance DATE DEFAULT NULL, CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE user_nom user_nom VARCHAR(255) DEFAULT NULL, CHANGE user_password user_password VARCHAR(255) DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB943A9D2A');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B91B65292');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB6B899279');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE rendezvous');
        $this->addSql('ALTER TABLE article CHANGE fournisseur_id fournisseur_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE detail detail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prix prix DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE id_cabinet id_cabinet INT DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_F804D3B91B65292 ON employe');
        $this->addSql('ALTER TABLE employe DROP employe_id');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matriel CHANGE nom nom DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_1ADAD7EB6B899279 ON patient');
        $this->addSql('DROP INDEX IDX_1ADAD7EB943A9D2A ON patient');
        $this->addSql('ALTER TABLE patient DROP patient_id, DROP patientfacture_id, CHANGE compagnant compagnant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero_fiche numero_fiche VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE assurance assurance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE code_cnam code_cnam VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prestation CHANGE nom_pathologie nom_pathologie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prix_min prix_min DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_max prix_max DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE produit CHANGE tva tva INT DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE role_date_creation role_date_creation DATETIME DEFAULT \'NULL\', CHANGE role_etat role_etat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT DEFAULT NULL, CHANGE user_patient_id user_patient_id INT DEFAULT NULL, CHANGE user_nom user_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_prenom user_prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_email user_email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_password user_password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_adresse user_adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_datenaissance user_datenaissance DATE DEFAULT \'NULL\', CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
