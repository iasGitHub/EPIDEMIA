<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210813004504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, mot2_passe VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pays CHANGE nom nom VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE point_surveillance DROP FOREIGN KEY FK_37F4543F9F2C3FAB');
        $this->addSql('DROP INDEX IDX_37F4543F9F2C3FAB ON point_surveillance');
        $this->addSql('ALTER TABLE point_surveillance CHANGE code code VARCHAR(80) NOT NULL, CHANGE coordonnees coordonnees VARCHAR(100) NOT NULL, CHANGE zone_id zones_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE point_surveillance ADD CONSTRAINT FK_37F4543FA6EAEB7A FOREIGN KEY (zones_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_37F4543FA6EAEB7A ON point_surveillance (zones_id)');
        $this->addSql('ALTER TABLE zone CHANGE nom nom VARCHAR(90) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE pays CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE point_surveillance DROP FOREIGN KEY FK_37F4543FA6EAEB7A');
        $this->addSql('DROP INDEX IDX_37F4543FA6EAEB7A ON point_surveillance');
        $this->addSql('ALTER TABLE point_surveillance CHANGE code code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE coordonnees coordonnees VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zones_id zone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE point_surveillance ADD CONSTRAINT FK_37F4543F9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_37F4543F9F2C3FAB ON point_surveillance (zone_id)');
        $this->addSql('ALTER TABLE zone CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
