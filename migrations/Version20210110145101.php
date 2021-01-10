<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110145101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE have_animal (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, person_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_AAF3A6BD8E962C16 (animal_id), INDEX IDX_AAF3A6BD217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE have_animal ADD CONSTRAINT FK_AAF3A6BD8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE have_animal ADD CONSTRAINT FK_AAF3A6BD217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE have_animal DROP FOREIGN KEY FK_AAF3A6BD217BBB47');
        $this->addSql('DROP TABLE have_animal');
        $this->addSql('DROP TABLE person');
    }
}
