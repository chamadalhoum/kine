<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520013204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dossiermedicale CHANGE patient_id patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE fournisseur_id fournisseur_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE detail detail VARCHAR(255) DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE date date DATETIME DEFAULT NULL, CHANGE id_cabinet id_cabinet INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employe CHANGE employe_id employe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture CHANGE num_fac num_fac VARCHAR(255) DEFAULT NULL, CHANGE montant_paye montant_paye DOUBLE PRECISION DEFAULT NULL, CHANGE montant_reste montant_reste DOUBLE PRECISION DEFAULT NULL, CHANGE nb_seance nb_seance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matriel CHANGE nom nom DOUBLE PRECISION DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE patientfacture_id patientfacture_id INT DEFAULT NULL, CHANGE compagnant compagnant VARCHAR(255) DEFAULT NULL, CHANGE numero_fiche numero_fiche VARCHAR(255) DEFAULT NULL, CHANGE assurance assurance VARCHAR(255) DEFAULT NULL, CHANGE code_cnam code_cnam VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation CHANGE nom_pathologie nom_pathologie VARCHAR(255) DEFAULT NULL, CHANGE prix_min prix_min DOUBLE PRECISION DEFAULT NULL, CHANGE prix_max prix_max DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE tva tva INT DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT NULL, CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendezvous CHANGE date date DATE DEFAULT NULL, CHANGE heure heure DATETIME DEFAULT NULL, CHANGE duree duree DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) DEFAULT NULL, CHANGE role_date_creation role_date_creation DATETIME DEFAULT NULL, CHANGE role_etat role_etat VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE suivi CHANGE dossiermedical_id dossiermedical_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT DEFAULT NULL, CHANGE user_patient_id user_patient_id INT DEFAULT NULL, CHANGE user_prenom user_prenom VARCHAR(255) DEFAULT NULL, CHANGE user_email user_email VARCHAR(255) DEFAULT NULL, CHANGE user_adresse user_adresse VARCHAR(255) DEFAULT NULL, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) DEFAULT NULL, CHANGE user_datenaissance user_datenaissance DATE DEFAULT NULL, CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE user_nom user_nom VARCHAR(255) DEFAULT NULL, CHANGE user_password user_password VARCHAR(255) DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE fournisseur_id fournisseur_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE detail detail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prix prix DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE id_cabinet id_cabinet INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dossiermedicale CHANGE patient_id patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employe CHANGE employe_id employe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture CHANGE num_fac num_fac VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant_paye montant_paye DOUBLE PRECISION DEFAULT \'NULL\', CHANGE montant_reste montant_reste DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nb_seance nb_seance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matriel CHANGE nom nom DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parametre CHANGE parametre_nom parametre_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE patient CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE patientfacture_id patientfacture_id INT DEFAULT NULL, CHANGE compagnant compagnant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero_fiche numero_fiche VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE assurance assurance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE code_cnam code_cnam VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prestation CHANGE nom_pathologie nom_pathologie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prix_min prix_min DOUBLE PRECISION DEFAULT \'NULL\', CHANGE prix_max prix_max DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE produit CHANGE tva tva INT DEFAULT NULL, CHANGE prix_ttc prix_ttc DOUBLE PRECISION DEFAULT \'NULL\', CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendezvous CHANGE date date DATE DEFAULT \'NULL\', CHANGE heure heure DATETIME DEFAULT \'NULL\', CHANGE duree duree DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE role CHANGE role_nom role_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE role_date_creation role_date_creation DATETIME DEFAULT \'NULL\', CHANGE role_etat role_etat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE suivi CHANGE dossiermedical_id dossiermedical_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT DEFAULT NULL, CHANGE user_patient_id user_patient_id INT DEFAULT NULL, CHANGE user_nom user_nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_prenom user_prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_email user_email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_password user_password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_adresse user_adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_tel user_tel INT DEFAULT NULL, CHANGE user_sex user_sex VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE user_datenaissance user_datenaissance DATE DEFAULT \'NULL\', CHANGE user_cin user_cin INT DEFAULT NULL, CHANGE user_matriculecnss user_matriculecnss VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
