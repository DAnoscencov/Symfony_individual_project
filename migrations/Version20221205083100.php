<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205083100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK__genre');
        $this->addSql('DROP INDEX FK__genre ON book');
        $this->addSql('ALTER TABLE book CHANGE genre_id genre_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331C2428192 FOREIGN KEY (genre_id_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C2428192 ON book (genre_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331C2428192');
        $this->addSql('DROP INDEX IDX_CBE5A331C2428192 ON book');
        $this->addSql('ALTER TABLE book CHANGE genre_id_id genre_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK__genre FOREIGN KEY (genre_id) REFERENCES genre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX FK__genre ON book (genre_id)');
    }
}
