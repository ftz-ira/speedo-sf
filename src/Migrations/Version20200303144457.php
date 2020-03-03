<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200303144457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banner CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY fk_banner_has_email_banner1');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY fk_banner_has_email_email1');
        $this->addSql('DROP INDEX fk_banner_has_email_banner1_idx ON banner_has_email');
        $this->addSql('CREATE INDEX IDX_BE7E2476684EC833 ON banner_has_email (banner_id)');
        $this->addSql('DROP INDEX fk_banner_has_email_email1_idx ON banner_has_email');
        $this->addSql('CREATE INDEX IDX_BE7E2476A832C1C9 ON banner_has_email (email_id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT fk_banner_has_email_banner1 FOREIGN KEY (banner_id) REFERENCES banner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT fk_banner_has_email_email1 FOREIGN KEY (email_id) REFERENCES email (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE credit CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE sponsorship CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wallet CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banner CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476684EC833');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476A832C1C9');
        $this->addSql('DROP INDEX idx_be7e2476684ec833 ON banner_has_email');
        $this->addSql('CREATE INDEX fk_banner_has_email_banner1_idx ON banner_has_email (banner_id)');
        $this->addSql('DROP INDEX idx_be7e2476a832c1c9 ON banner_has_email');
        $this->addSql('CREATE INDEX fk_banner_has_email_email1_idx ON banner_has_email (email_id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE credit CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE sponsorship CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT NOT NULL');
        $this->addSql('ALTER TABLE wallet CHANGE user_id user_id INT NOT NULL');
    }
}
