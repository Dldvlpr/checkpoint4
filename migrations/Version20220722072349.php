<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722072349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile ADD user_id INT DEFAULT NULL, ADD lol_id LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE lol_profile ADD CONSTRAINT FK_3BCF0C45A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3BCF0C45A76ED395 ON lol_profile (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile DROP FOREIGN KEY FK_3BCF0C45A76ED395');
        $this->addSql('DROP INDEX IDX_3BCF0C45A76ED395 ON lol_profile');
        $this->addSql('ALTER TABLE lol_profile DROP user_id, DROP lol_id');
    }
}
