<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721210243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile ADD summoner_name VARCHAR(255) NOT NULL, DROP ranked_flex, DROP ranked_solo, DROP lol_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile ADD ranked_flex LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD ranked_solo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD lol_id LONGTEXT DEFAULT NULL, DROP summoner_name');
    }
}
