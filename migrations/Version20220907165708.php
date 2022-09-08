<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907165708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C700047D2');
        $this->addSql('DROP INDEX IDX_11BA68C700047D2 ON notes');
        $this->addSql('ALTER TABLE notes ADD description VARCHAR(255) DEFAULT NULL, DROP ticket_id');
        $this->addSql('ALTER TABLE ticket DROP description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes ADD ticket_id INT DEFAULT NULL, DROP description');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('CREATE INDEX IDX_11BA68C700047D2 ON notes (ticket_id)');
        $this->addSql('ALTER TABLE ticket ADD description VARCHAR(255) DEFAULT NULL');
    }
}
