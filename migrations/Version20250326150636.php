<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250326150636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE autores (id INT AUTO_INCREMENT NOT NULL, editorial_id INT DEFAULT NULL, nombre VARCHAR(100) NOT NULL, INDEX IDX_2A6A65DBAF1A24D (editorial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE editorial (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE libro (id INT AUTO_INCREMENT NOT NULL, autor_id INT NOT NULL, editorial_id INT NOT NULL, titulo VARCHAR(100) NOT NULL, a_publicacion INT NOT NULL, UNIQUE INDEX UNIQ_5799AD2B14D45BBE (autor_id), INDEX IDX_5799AD2BBAF1A24D (editorial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE autores ADD CONSTRAINT FK_2A6A65DBAF1A24D FOREIGN KEY (editorial_id) REFERENCES editorial (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE libro ADD CONSTRAINT FK_5799AD2B14D45BBE FOREIGN KEY (autor_id) REFERENCES autores (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE libro ADD CONSTRAINT FK_5799AD2BBAF1A24D FOREIGN KEY (editorial_id) REFERENCES editorial (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE autores DROP FOREIGN KEY FK_2A6A65DBAF1A24D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE libro DROP FOREIGN KEY FK_5799AD2B14D45BBE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE libro DROP FOREIGN KEY FK_5799AD2BBAF1A24D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE autores
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE editorial
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE libro
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
