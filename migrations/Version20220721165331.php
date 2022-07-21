<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721165331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile DROP FOREIGN KEY FK_3BCF0C45A76ED395');
        $this->addSql('DROP INDEX UNIQ_3BCF0C45A76ED395 ON lol_profile');
        $this->addSql('ALTER TABLE lol_profile DROP user_id, DROP league_id, DROP summoner_id, DROP summoner_name, DROP summoner_tier, DROP summoner_rank, DROP league_points, CHANGE solo ranked_solo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lol_profile ADD user_id INT DEFAULT NULL, ADD league_id VARCHAR(255) NOT NULL, ADD summoner_id VARCHAR(255) NOT NULL, ADD summoner_name VARCHAR(255) NOT NULL, ADD summoner_tier VARCHAR(255) DEFAULT NULL, ADD summoner_rank VARCHAR(255) DEFAULT NULL, ADD league_points INT DEFAULT NULL, CHANGE ranked_solo solo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE lol_profile ADD CONSTRAINT FK_3BCF0C45A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3BCF0C45A76ED395 ON lol_profile (user_id)');
    }
}
