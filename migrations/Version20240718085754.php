<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718085754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE related_posts (post_id INT NOT NULL, related_post_id INT NOT NULL, INDEX IDX_F8DC5CD14B89032C (post_id), INDEX IDX_F8DC5CD17490C989 (related_post_id), PRIMARY KEY(post_id, related_post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE related_posts ADD CONSTRAINT FK_F8DC5CD14B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE related_posts ADD CONSTRAINT FK_F8DC5CD17490C989 FOREIGN KEY (related_post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE related_posts DROP FOREIGN KEY FK_F8DC5CD14B89032C');
        $this->addSql('ALTER TABLE related_posts DROP FOREIGN KEY FK_F8DC5CD17490C989');
        $this->addSql('DROP TABLE related_posts');
    }
}
