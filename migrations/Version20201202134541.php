<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202134541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, user_id INT NOT NULL, pseudo VARCHAR(100) NOT NULL, i_lvl INT NOT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_937AB0348F5EA509 (classe_id), INDEX IDX_937AB034A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0348F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE raid_offer ADD armor_type_id INT NOT NULL, ADD raid_offer_id INT NOT NULL, ADD customer VARCHAR(100) NOT NULL, ADD comment VARCHAR(255) DEFAULT NULL, ADD date DATE DEFAULT NULL, ADD amount INT NOT NULL');
        $this->addSql('ALTER TABLE raid_offer ADD CONSTRAINT FK_F85FB153A5BF8724 FOREIGN KEY (armor_type_id) REFERENCES armor_type (id)');
        $this->addSql('ALTER TABLE raid_offer ADD CONSTRAINT FK_F85FB153EB186BD FOREIGN KEY (raid_offer_id) REFERENCES raid_offer (id)');
        $this->addSql('CREATE INDEX IDX_F85FB153A5BF8724 ON raid_offer (armor_type_id)');
        $this->addSql('CREATE INDEX IDX_F85FB153EB186BD ON raid_offer (raid_offer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `character`');
        $this->addSql('ALTER TABLE raid_offer DROP FOREIGN KEY FK_F85FB153A5BF8724');
        $this->addSql('ALTER TABLE raid_offer DROP FOREIGN KEY FK_F85FB153EB186BD');
        $this->addSql('DROP INDEX IDX_F85FB153A5BF8724 ON raid_offer');
        $this->addSql('DROP INDEX IDX_F85FB153EB186BD ON raid_offer');
        $this->addSql('ALTER TABLE raid_offer DROP armor_type_id, DROP raid_offer_id, DROP customer, DROP comment, DROP date, DROP amount');
    }
}
