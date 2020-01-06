<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102142208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_basic_bloc (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, order_by INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_bloc (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_image_bloc (id INT NOT NULL, picture_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A9B8765EEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms_bloc_translation (id INT AUTO_INCREMENT NOT NULL, bloc_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, locale VARCHAR(4) NOT NULL, INDEX IDX_3DFF527D5582E9C0 (bloc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE text_bloc ADD CONSTRAINT FK_C006EB6FBF396750 FOREIGN KEY (id) REFERENCES cms_basic_bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE text_image_bloc ADD CONSTRAINT FK_A9B8765EEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE text_image_bloc ADD CONSTRAINT FK_A9B8765EBF396750 FOREIGN KEY (id) REFERENCES cms_basic_bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cms_bloc_translation ADD CONSTRAINT FK_3DFF527D5582E9C0 FOREIGN KEY (bloc_id) REFERENCES text_bloc (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE text_bloc DROP FOREIGN KEY FK_C006EB6FBF396750');
        $this->addSql('ALTER TABLE text_image_bloc DROP FOREIGN KEY FK_A9B8765EBF396750');
        $this->addSql('ALTER TABLE cms_bloc_translation DROP FOREIGN KEY FK_3DFF527D5582E9C0');
        $this->addSql('ALTER TABLE text_image_bloc DROP FOREIGN KEY FK_A9B8765EEE45BDBF');
        $this->addSql('DROP TABLE cms_basic_bloc');
        $this->addSql('DROP TABLE text_bloc');
        $this->addSql('DROP TABLE text_image_bloc');
        $this->addSql('DROP TABLE cms_bloc_translation');
        $this->addSql('DROP TABLE picture');
    }
}
