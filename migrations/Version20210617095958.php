<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617095958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact_form (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_cases ADD content_img1 VARCHAR(255) DEFAULT NULL, ADD content_img2 VARCHAR(255) DEFAULT NULL, ADD content_img3 VARCHAR(255) DEFAULT NULL, ADD content_img4 VARCHAR(255) DEFAULT NULL, ADD content_img5 VARCHAR(255) DEFAULT NULL, ADD content_img6 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact_form');
        $this->addSql('ALTER TABLE photo_cases DROP content_img1, DROP content_img2, DROP content_img3, DROP content_img4, DROP content_img5, DROP content_img6');
    }
}
