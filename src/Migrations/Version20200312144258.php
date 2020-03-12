<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312144258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921FE9571A63');
        $this->addSql('DROP INDEX IDX_7C68921FE9571A63 ON wallet');
        $this->addSql('ALTER TABLE wallet DROP crypto_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wallet ADD crypto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921FE9571A63 FOREIGN KEY (crypto_id) REFERENCES crypto (id)');
        $this->addSql('CREATE INDEX IDX_7C68921FE9571A63 ON wallet (crypto_id)');
    }
}
