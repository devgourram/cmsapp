<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200103094452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_page (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_33CAFA672C2AC5D3 (translatable_id), UNIQUE INDEX cms_page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms_basic_bloc (id INT AUTO_INCREMENT NOT NULL, cms_page_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, order_by INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_A0AEA2B452AA6CF5 (cms_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_bloc (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_image_bloc (id INT NOT NULL, picture_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A9B8765EEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_bloc_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_1DF53042C2AC5D3 (translatable_id), UNIQUE INDEX text_bloc_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_page_translation ADD CONSTRAINT FK_33CAFA672C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES cms_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cms_basic_bloc ADD CONSTRAINT FK_A0AEA2B452AA6CF5 FOREIGN KEY (cms_page_id) REFERENCES cms_page (id)');
        $this->addSql('ALTER TABLE text_bloc ADD CONSTRAINT FK_C006EB6FBF396750 FOREIGN KEY (id) REFERENCES cms_basic_bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE text_image_bloc ADD CONSTRAINT FK_A9B8765EEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE text_image_bloc ADD CONSTRAINT FK_A9B8765EBF396750 FOREIGN KEY (id) REFERENCES cms_basic_bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE text_bloc_translation ADD CONSTRAINT FK_1DF53042C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES text_bloc (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_page_translation DROP FOREIGN KEY FK_33CAFA672C2AC5D3');
        $this->addSql('ALTER TABLE cms_basic_bloc DROP FOREIGN KEY FK_A0AEA2B452AA6CF5');
        $this->addSql('ALTER TABLE text_bloc DROP FOREIGN KEY FK_C006EB6FBF396750');
        $this->addSql('ALTER TABLE text_image_bloc DROP FOREIGN KEY FK_A9B8765EBF396750');
        $this->addSql('ALTER TABLE text_bloc_translation DROP FOREIGN KEY FK_1DF53042C2AC5D3');
        $this->addSql('ALTER TABLE text_image_bloc DROP FOREIGN KEY FK_A9B8765EEE45BDBF');
        $this->addSql('DROP TABLE cms_page');
        $this->addSql('DROP TABLE cms_page_translation');
        $this->addSql('DROP TABLE cms_basic_bloc');
        $this->addSql('DROP TABLE text_bloc');
        $this->addSql('DROP TABLE text_image_bloc');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE text_bloc_translation');
    }
}
