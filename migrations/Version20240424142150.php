<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424142150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD energies_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DAD192AC7 FOREIGN KEY (energies_id) REFERENCES energy (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DAD192AC7 ON car (energies_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DAD192AC7');
        $this->addSql('DROP INDEX UNIQ_773DE69DAD192AC7 ON car');
        $this->addSql('ALTER TABLE car DROP energies_id');
    }
}
