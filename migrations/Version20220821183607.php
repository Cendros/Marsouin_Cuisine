<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220821183607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, numero SMALLINT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_285F75DD89312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantite (id INT AUTO_INCREMENT NOT NULL, ingredient_id INT NOT NULL, unite_id INT NOT NULL, recette_id INT NOT NULL, valeur INT NOT NULL, INDEX IDX_8BF24A79933FE08C (ingredient_id), INDEX IDX_8BF24A79EC4A74AB (unite_id), INDEX IDX_8BF24A7989312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, symbole VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE quantite ADD CONSTRAINT FK_8BF24A79933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE quantite ADD CONSTRAINT FK_8BF24A79EC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id)');
        $this->addSql('ALTER TABLE quantite ADD CONSTRAINT FK_8BF24A7989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD89312FE9');
        $this->addSql('ALTER TABLE quantite DROP FOREIGN KEY FK_8BF24A79933FE08C');
        $this->addSql('ALTER TABLE quantite DROP FOREIGN KEY FK_8BF24A79EC4A74AB');
        $this->addSql('ALTER TABLE quantite DROP FOREIGN KEY FK_8BF24A7989312FE9');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE quantite');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
