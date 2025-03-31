<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250331172843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, clave VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // Inserción de registros iniciales
        $this->addSql(<<<'SQL'
            INSERT INTO usuario (nombre, email, password) VALUES 
            ('Juan Pérez', 'juan.perez@example.com', 'clave123'),
            ('María López', 'maria.lopez@example.com', 'segura456'),
            ('Carlos Sánchez', 'carlos.sanchez@example.com', 'password789'),
            ('Ana García', 'ana.garcia@example.com', 'clave987')
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE usuario
        SQL);
    }
}
