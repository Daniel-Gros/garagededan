<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425214249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP INDEX UNIQ_773DE69DD966BF49, ADD INDEX IDX_773DE69DD966BF49 (models_id)');
        $this->addSql('ALTER TABLE car DROP INDEX UNIQ_773DE69DEDDF52D, ADD INDEX IDX_773DE69DEDDF52D (energy_id)');
    }
}
