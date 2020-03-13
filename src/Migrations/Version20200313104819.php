<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200313104819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE banner (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, code VARCHAR(500) DEFAULT NULL, type VARCHAR(45) DEFAULT NULL, INDEX fk_banner_user1_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banner_has_email (banner_id INT NOT NULL, email_id INT NOT NULL, INDEX IDX_BE7E2476684EC833 (banner_id), INDEX IDX_BE7E2476A832C1C9 (email_id), PRIMARY KEY(banner_id, email_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credit (id INT NOT NULL, type_payment_id INT NOT NULL, user_id INT NOT NULL, created_date DATETIME DEFAULT NULL, montant DOUBLE PRECISION DEFAULT NULL, solde_out TINYINT(1) DEFAULT NULL, paye_date VARCHAR(45) DEFAULT NULL, update_date VARCHAR(45) DEFAULT NULL, INDEX fk_credit_type_payment1_idx (type_payment_id), INDEX fk_credit_user1_idx (user_id), PRIMARY KEY(id, type_payment_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crypto (id INT AUTO_INCREMENT NOT NULL, wallet_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, value INT DEFAULT NULL, INDEX IDX_68282885712520F3 (wallet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, banners VARCHAR(45) DEFAULT NULL, send TINYINT(1) DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, subject VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsorship (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_date DATETIME DEFAULT NULL, update_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, level INT DEFAULT NULL, INDEX fk_sponsorship_user1_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_payment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) DEFAULT NULL, active TINYINT(1) DEFAULT NULL, created_date DATETIME DEFAULT NULL, update_date VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, pseudo LONGTEXT NOT NULL, created_date DATETIME NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallet (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, created_date DATETIME NOT NULL, update_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_7C68921FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFE19C0759E FOREIGN KEY (type_payment_id) REFERENCES type_payment (id)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE crypto ADD CONSTRAINT FK_68282885712520F3 FOREIGN KEY (wallet_id) REFERENCES wallet (id)');
        $this->addSql('ALTER TABLE sponsorship ADD CONSTRAINT FK_C0F10CD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476684EC833');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476A832C1C9');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFE19C0759E');
        $this->addSql('ALTER TABLE banner DROP FOREIGN KEY FK_6F9DB8E7A76ED395');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFEA76ED395');
        $this->addSql('ALTER TABLE sponsorship DROP FOREIGN KEY FK_C0F10CD4A76ED395');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921FA76ED395');
        $this->addSql('ALTER TABLE crypto DROP FOREIGN KEY FK_68282885712520F3');
        $this->addSql('DROP TABLE banner');
        $this->addSql('DROP TABLE banner_has_email');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE crypto');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE sponsorship');
        $this->addSql('DROP TABLE type_payment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wallet');
    }
}
