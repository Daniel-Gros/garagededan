<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424083148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE din_power (id INT AUTO_INCREMENT NOT NULL, number_of_din_hp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE door (id INT AUTO_INCREMENT NOT NULL, number_of_doors INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, number_of_hp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sit (id INT AUTO_INCREMENT NOT NULL, number_of_sits INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_option DROP FOREIGN KEY FK_42EEEC42C3C6F69F');
        $this->addSql('ALTER TABLE car_option DROP FOREIGN KEY FK_42EEEC42A7C41D6F');
        $this->addSql('DROP TABLE car_option');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('ALTER TABLE car ADD color_id INT NOT NULL, ADD sit_id INT NOT NULL, ADD door_id INT NOT NULL, ADD power_id INT NOT NULL, ADD din_power_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DD50BE019 FOREIGN KEY (sit_id) REFERENCES sit (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D58639EAE FOREIGN KEY (door_id) REFERENCES door (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DAB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DD7B09F2C FOREIGN KEY (din_power_id) REFERENCES din_power (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7ADA1FB5 ON car (color_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DD50BE019 ON car (sit_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D58639EAE ON car (door_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DAB4FC384 ON car (power_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DD7B09F2C ON car (din_power_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7ADA1FB5');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DD7B09F2C');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D58639EAE');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DAB4FC384');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DD50BE019');
        $this->addSql('CREATE TABLE car_option (car_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_42EEEC42C3C6F69F (car_id), INDEX IDX_42EEEC42A7C41D6F (option_id), PRIMARY KEY(car_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sits SMALLINT DEFAULT NULL, doors SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE car_option ADD CONSTRAINT FK_42EEEC42C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_option ADD CONSTRAINT FK_42EEEC42A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE din_power');
        $this->addSql('DROP TABLE door');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE sit');
        $this->addSql('DROP INDEX IDX_773DE69D7ADA1FB5 ON car');
        $this->addSql('DROP INDEX IDX_773DE69DD50BE019 ON car');
        $this->addSql('DROP INDEX IDX_773DE69D58639EAE ON car');
        $this->addSql('DROP INDEX IDX_773DE69DAB4FC384 ON car');
        $this->addSql('DROP INDEX IDX_773DE69DD7B09F2C ON car');
        $this->addSql('ALTER TABLE car DROP color_id, DROP sit_id, DROP door_id, DROP power_id, DROP din_power_id');
    }
}
