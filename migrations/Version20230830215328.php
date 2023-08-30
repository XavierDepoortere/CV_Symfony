<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230830215328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, image VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, link_source VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_language (projet_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_F35B1A42C18272 (projet_id), INDEX IDX_F35B1A4282F1BAF4 (language_id), PRIMARY KEY(projet_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_framework (projet_id INT NOT NULL, framework_id INT NOT NULL, INDEX IDX_BE8889CDC18272 (projet_id), INDEX IDX_BE8889CD37AECF72 (framework_id), PRIMARY KEY(projet_id, framework_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet_language ADD CONSTRAINT FK_F35B1A42C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_language ADD CONSTRAINT FK_F35B1A4282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_framework ADD CONSTRAINT FK_BE8889CDC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_framework ADD CONSTRAINT FK_BE8889CD37AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet_language DROP FOREIGN KEY FK_F35B1A42C18272');
        $this->addSql('ALTER TABLE projet_language DROP FOREIGN KEY FK_F35B1A4282F1BAF4');
        $this->addSql('ALTER TABLE projet_framework DROP FOREIGN KEY FK_BE8889CDC18272');
        $this->addSql('ALTER TABLE projet_framework DROP FOREIGN KEY FK_BE8889CD37AECF72');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE projet_language');
        $this->addSql('DROP TABLE projet_framework');
    }
}
