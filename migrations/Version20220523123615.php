<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523123615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poem_category (poem_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_245934CA8938791B (poem_id), INDEX IDX_245934CA12469DE2 (category_id), PRIMARY KEY(poem_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poem_category ADD CONSTRAINT FK_245934CA8938791B FOREIGN KEY (poem_id) REFERENCES poem (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poem_category ADD CONSTRAINT FK_245934CA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category_poem');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_poem (category_id INT NOT NULL, poem_id INT NOT NULL, INDEX IDX_A9E20BDD8938791B (poem_id), INDEX IDX_A9E20BDD12469DE2 (category_id), PRIMARY KEY(category_id, poem_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_poem ADD CONSTRAINT FK_A9E20BDD8938791B FOREIGN KEY (poem_id) REFERENCES poem (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_poem ADD CONSTRAINT FK_A9E20BDD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE poem_category');
    }
}
