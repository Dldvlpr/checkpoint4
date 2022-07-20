<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720083202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile ADD league_id VARCHAR(255) NOT NULL, ADD summoner_id VARCHAR(255) NOT NULL, ADD summoner_name VARCHAR(255) NOT NULL, ADD summoner_tier VARCHAR(255) DEFAULT NULL, ADD summoner_rank VARCHAR(255) DEFAULT NULL, ADD league_points INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile DROP league_id, DROP summoner_id, DROP summoner_name, DROP summoner_tier, DROP summoner_rank, DROP league_points');
    }
}
