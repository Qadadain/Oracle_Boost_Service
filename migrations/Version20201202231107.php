<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202231107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, pseudo VARCHAR(100) NOT NULL, i_lvl INT NOT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_937AB0348F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, color INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dungeon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dungeon_boost (id INT AUTO_INCREMENT NOT NULL, armor_type_id INT NOT NULL, dungeon_id INT NOT NULL, key_difficulty_id INT NOT NULL, tank_id INT NOT NULL, heal_id INT NOT NULL, dps_one_id INT NOT NULL, dps_two_id INT NOT NULL, customer VARCHAR(100) NOT NULL, amount INT NOT NULL, comment VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, INDEX IDX_E566898AA5BF8724 (armor_type_id), INDEX IDX_E566898AB606863 (dungeon_id), INDEX IDX_E566898ABEA78BBC (key_difficulty_id), INDEX IDX_E566898A15C652B5 (tank_id), INDEX IDX_E566898A31AE4971 (heal_id), INDEX IDX_E566898A763F6F34 (dps_one_id), INDEX IDX_E566898A1D6388FB (dps_two_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_boost (id INT AUTO_INCREMENT NOT NULL, amount_dungeon_boost INT NOT NULL, stack_armor_amount INT NOT NULL, message_information LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE key_difficulty (id INT AUTO_INCREMENT NOT NULL, difficulty VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raid_boost (id INT AUTO_INCREMENT NOT NULL, armor_type_id INT NOT NULL, raid_offer_id INT NOT NULL, customer VARCHAR(255) NOT NULL, amount INT NOT NULL, comment VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, INDEX IDX_87ED1105A5BF8724 (armor_type_id), INDEX IDX_87ED1105EB186BD (raid_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raid_offer (id INT AUTO_INCREMENT NOT NULL, offer_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0348F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898AA5BF8724 FOREIGN KEY (armor_type_id) REFERENCES armor_type (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898AB606863 FOREIGN KEY (dungeon_id) REFERENCES dungeon (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898ABEA78BBC FOREIGN KEY (key_difficulty_id) REFERENCES key_difficulty (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898A15C652B5 FOREIGN KEY (tank_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898A31AE4971 FOREIGN KEY (heal_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898A763F6F34 FOREIGN KEY (dps_one_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE dungeon_boost ADD CONSTRAINT FK_E566898A1D6388FB FOREIGN KEY (dps_two_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE raid_boost ADD CONSTRAINT FK_87ED1105A5BF8724 FOREIGN KEY (armor_type_id) REFERENCES armor_type (id)');
        $this->addSql('ALTER TABLE raid_boost ADD CONSTRAINT FK_87ED1105EB186BD FOREIGN KEY (raid_offer_id) REFERENCES raid_offer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898AA5BF8724');
        $this->addSql('ALTER TABLE raid_boost DROP FOREIGN KEY FK_87ED1105A5BF8724');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898A15C652B5');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898A31AE4971');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898A763F6F34');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898A1D6388FB');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0348F5EA509');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898AB606863');
        $this->addSql('ALTER TABLE dungeon_boost DROP FOREIGN KEY FK_E566898ABEA78BBC');
        $this->addSql('ALTER TABLE raid_boost DROP FOREIGN KEY FK_87ED1105EB186BD');
        $this->addSql('DROP TABLE armor_type');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE dungeon');
        $this->addSql('DROP TABLE dungeon_boost');
        $this->addSql('DROP TABLE information_boost');
        $this->addSql('DROP TABLE key_difficulty');
        $this->addSql('DROP TABLE raid_boost');
        $this->addSql('DROP TABLE raid_offer');
        $this->addSql('DROP TABLE user');
    }
}
