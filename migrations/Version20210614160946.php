<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614160946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_cases_photo_categories (photo_cases_id INT NOT NULL, photo_categories_id INT NOT NULL, INDEX IDX_BCAC8862B955B4E8 (photo_cases_id), INDEX IDX_BCAC886226233E60 (photo_categories_id), PRIMARY KEY(photo_cases_id, photo_categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_cases_photo_categories ADD CONSTRAINT FK_BCAC8862B955B4E8 FOREIGN KEY (photo_cases_id) REFERENCES photo_cases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_cases_photo_categories ADD CONSTRAINT FK_BCAC886226233E60 FOREIGN KEY (photo_categories_id) REFERENCES photo_categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photo_cases_photo_categories');
    }
}
