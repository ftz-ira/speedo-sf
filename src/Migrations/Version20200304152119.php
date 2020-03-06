<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200304152119 extends AbstractMigration
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
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, banners VARCHAR(45) DEFAULT NULL, send TINYINT(1) DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, subject VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, active VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsorship (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_date DATETIME DEFAULT NULL, update_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, level INT DEFAULT NULL, INDEX fk_sponsorship_user1_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, active TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_payment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) DEFAULT NULL, active TINYINT(1) DEFAULT NULL, created_date DATETIME DEFAULT NULL, update_date VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, status_id INT DEFAULT NULL, pseudo VARCHAR(45) NOT NULL, birthday DATETIME DEFAULT NULL, created_date DATETIME NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT NULL, sponsorship_link VARCHAR(255) DEFAULT NULL, INDEX fk_user_role1_idx (role_id), INDEX fk_user_status_idx (status_id), UNIQUE INDEX pseudo_UNIQUE (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallet (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, crypto_name VARCHAR(45) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, active VARCHAR(45) DEFAULT NULL, created_date DATETIME DEFAULT NULL, update_date DATETIME DEFAULT NULL, INDEX fk_wallet_user1_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id)');
        $this->addSql('ALTER TABLE banner_has_email ADD CONSTRAINT FK_BE7E2476A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFE19C0759E FOREIGN KEY (type_payment_id) REFERENCES type_payment (id)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sponsorship ADD CONSTRAINT FK_C0F10CD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476684EC833');
        $this->addSql('ALTER TABLE banner_has_email DROP FOREIGN KEY FK_BE7E2476A832C1C9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496BF700BD');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFE19C0759E');
        $this->addSql('ALTER TABLE banner DROP FOREIGN KEY FK_6F9DB8E7A76ED395');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFEA76ED395');
        $this->addSql('ALTER TABLE sponsorship DROP FOREIGN KEY FK_C0F10CD4A76ED395');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921FA76ED395');
        $this->addSql('DROP TABLE banner');
        $this->addSql('DROP TABLE banner_has_email');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE sponsorship');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE type_payment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wallet');
    }
}
