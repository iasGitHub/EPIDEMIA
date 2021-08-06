<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804152614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point_surveillance (id INT AUTO_INCREMENT NOT NULL, zones_id INT DEFAULT NULL, code VARCHAR(80) NOT NULL, coordonnees VARCHAR(100) NOT NULL, INDEX IDX_37F4543FA6EAEB7A (zones_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, nom_zone VARCHAR(90) NOT NULL, INDEX IDX_A0EBC007A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE point_surveillance ADD CONSTRAINT FK_37F4543FA6EAEB7A FOREIGN KEY (zones_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007A6E44244');
        $this->addSql('ALTER TABLE point_surveillance DROP FOREIGN KEY FK_37F4543FA6EAEB7A');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE point_surveillance');
        $this->addSql('DROP TABLE zone');
    }
}
