<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200103094418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE text_bloc_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_1DF53042C2AC5D3 (translatable_id), UNIQUE INDEX text_bloc_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE text_bloc_translation ADD CONSTRAINT FK_1DF53042C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES text_bloc (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE cms_bloc_translation');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_bloc_translation (id INT AUTO_INCREMENT NOT NULL, bloc_id INT DEFAULT NULL, content LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, locale VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_3DFF527D5582E9C0 (bloc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cms_bloc_translation ADD CONSTRAINT FK_3DFF527D5582E9C0 FOREIGN KEY (bloc_id) REFERENCES text_bloc (id)');
        $this->addSql('DROP TABLE text_bloc_translation');
    }
}
