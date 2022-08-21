<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220821211817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantite ADD etape_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quantite ADD CONSTRAINT FK_8BF24A794A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
        $this->addSql('CREATE INDEX IDX_8BF24A794A8CA2AD ON quantite (etape_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantite DROP FOREIGN KEY FK_8BF24A794A8CA2AD');
        $this->addSql('DROP INDEX IDX_8BF24A794A8CA2AD ON quantite');
        $this->addSql('ALTER TABLE quantite DROP etape_id');
    }
}
