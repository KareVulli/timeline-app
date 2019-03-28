<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328131713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event CHANGE created created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE removed_at removed_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE created created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE removed_at removed_at DATETIME DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event CHANGE created created DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE removed_at removed_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE created created DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE removed_at removed_at DATETIME DEFAULT \'NULL\'');
    }
}
