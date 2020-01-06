<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102222701 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_page_translation DROP FOREIGN KEY FK_33CAFA6752AA6CF5');
        $this->addSql('DROP INDEX IDX_33CAFA6752AA6CF5 ON cms_page_translation');
        $this->addSql('ALTER TABLE cms_page_translation CHANGE locale locale VARCHAR(255) NOT NULL, CHANGE cms_page_id translatable_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_page_translation ADD CONSTRAINT FK_33CAFA672C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES cms_page (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_33CAFA672C2AC5D3 ON cms_page_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX cms_page_translation_unique_translation ON cms_page_translation (translatable_id, locale)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_page_translation DROP FOREIGN KEY FK_33CAFA672C2AC5D3');
        $this->addSql('DROP INDEX IDX_33CAFA672C2AC5D3 ON cms_page_translation');
        $this->addSql('DROP INDEX cms_page_translation_unique_translation ON cms_page_translation');
        $this->addSql('ALTER TABLE cms_page_translation CHANGE locale locale VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE translatable_id cms_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_page_translation ADD CONSTRAINT FK_33CAFA6752AA6CF5 FOREIGN KEY (cms_page_id) REFERENCES cms_page (id)');
        $this->addSql('CREATE INDEX IDX_33CAFA6752AA6CF5 ON cms_page_translation (cms_page_id)');
    }
}
