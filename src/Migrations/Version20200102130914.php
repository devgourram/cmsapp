<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102130914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_page_translation ADD cms_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_page_translation ADD CONSTRAINT FK_33CAFA6752AA6CF5 FOREIGN KEY (cms_page_id) REFERENCES cms_page (id)');
        $this->addSql('CREATE INDEX IDX_33CAFA6752AA6CF5 ON cms_page_translation (cms_page_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_page_translation DROP FOREIGN KEY FK_33CAFA6752AA6CF5');
        $this->addSql('DROP INDEX IDX_33CAFA6752AA6CF5 ON cms_page_translation');
        $this->addSql('ALTER TABLE cms_page_translation DROP cms_page_id');
    }
}
