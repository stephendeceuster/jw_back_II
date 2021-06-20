<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620152209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wood_cases (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, thumbnail VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, published TINYINT(1) NOT NULL, sorting INT DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wood_cases_wood_categories (wood_cases_id INT NOT NULL, wood_categories_id INT NOT NULL, INDEX IDX_70F91DA66BB5F37F (wood_cases_id), INDEX IDX_70F91DA6592AD2D9 (wood_categories_id), PRIMARY KEY(wood_cases_id, wood_categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wood_cases_wood_types (wood_cases_id INT NOT NULL, wood_types_id INT NOT NULL, INDEX IDX_4EEB89E36BB5F37F (wood_cases_id), INDEX IDX_4EEB89E3CF6E6B4A (wood_types_id), PRIMARY KEY(wood_cases_id, wood_types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wood_categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, thumbnail VARCHAR(255) NOT NULL, published TINYINT(1) NOT NULL, sorting INT DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wood_types (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wood_cases_wood_categories ADD CONSTRAINT FK_70F91DA66BB5F37F FOREIGN KEY (wood_cases_id) REFERENCES wood_cases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wood_cases_wood_categories ADD CONSTRAINT FK_70F91DA6592AD2D9 FOREIGN KEY (wood_categories_id) REFERENCES wood_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wood_cases_wood_types ADD CONSTRAINT FK_4EEB89E36BB5F37F FOREIGN KEY (wood_cases_id) REFERENCES wood_cases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wood_cases_wood_types ADD CONSTRAINT FK_4EEB89E3CF6E6B4A FOREIGN KEY (wood_types_id) REFERENCES wood_types (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wood_cases_wood_categories DROP FOREIGN KEY FK_70F91DA66BB5F37F');
        $this->addSql('ALTER TABLE wood_cases_wood_types DROP FOREIGN KEY FK_4EEB89E36BB5F37F');
        $this->addSql('ALTER TABLE wood_cases_wood_categories DROP FOREIGN KEY FK_70F91DA6592AD2D9');
        $this->addSql('ALTER TABLE wood_cases_wood_types DROP FOREIGN KEY FK_4EEB89E3CF6E6B4A');
        $this->addSql('DROP TABLE wood_cases');
        $this->addSql('DROP TABLE wood_cases_wood_categories');
        $this->addSql('DROP TABLE wood_cases_wood_types');
        $this->addSql('DROP TABLE wood_categories');
        $this->addSql('DROP TABLE wood_types');
    }
}
