<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327121031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE libro_no_relacional (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(100) NOT NULL, editorial VARCHAR(100) NOT NULL, autor VARCHAR(100) NOT NULL, a_publicacion INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // Editoriales
        $this->addSql("INSERT INTO editorial (id, nombre) VALUES 
            (1, 'Editorial Planeta'),
            (2, 'Editorial Alfaguara'),
            (3, 'Editorial Anagrama'),
            (4, 'Editorial Random House'),
            (5, 'Editorial Tusquets')");
        
        // Autores
        $this->addSql("INSERT INTO autores (id, editorial_id, nombre) VALUES 
            (1, 1, 'Gabriel García Márquez'),
            (2, 1, 'Mario Vargas Llosa'),
            (3, 2, 'Isabel Allende'),
            (4, 2, 'Jorge Luis Borges'),
            (5, 3, 'Carlos Ruiz Zafón'),
            (6, 3, 'Julio Cortázar'),
            (7, 4, 'Pablo Neruda'),
            (8, 4, 'Ernesto Sabato'),
            (9, 5, 'Roberto Bolaño'),
            (10, 5, 'Adolfo Bioy Casares'),
            (11, 1, 'Silvina Ocampo'),
            (12, 2, 'Juan Rulfo'),
            (13, 3, 'Horacio Quiroga'),
            (14, 4, 'Alejandra Pizarnik'),
            (15, 5, 'Eduardo Galeano'),
            (16, 3, 'autor1')");
        
        // Libros
        $this->addSql("INSERT INTO libro (id, autor_id, editorial_id, titulo, a_publicacion) VALUES 
            (1, 1, 1, 'Cien años de soledad', 1967),
            (2, 2, 1, 'La ciudad y los perros', 1963),
            (3, 3, 2, 'La casa de los espíritus', 1982),
            (4, 4, 2, 'Ficciones', 1944),
            (5, 5, 3, 'La sombra del viento', 2001),
            (6, 6, 3, 'Rayuela', 1963),
            (7, 7, 4, 'Veinte poemas de amor y una canción desesperada', 1924),
            (8, 8, 4, 'Sobre héroes y tumbas', 1961),
            (9, 9, 5, '2666', 2004),
            (10, 10, 5, 'La invención de Morel', 1940),
            (11, 11, 1, 'El espíritu de la colmena', 1973),
            (12, 12, 2, 'Pedro Páramo', 1955),
            (13, 13, 3, 'Cuentos de la selva', 1918),
            (14, 14, 4, 'Las cosas', 1963),
            (15, 15, 5, 'Las venas abiertas de América Latina', 1971),
            (27, 16, 3, 'prueba', 1997)");
        
        // Libros no relacionales
        $this->addSql("INSERT INTO libro_no_relacional (id, titulo, editorial, autor, a_publicacion) VALUES 
            (1, 'Cien años de soledad', 'Editorial Planeta', 'Gabriel García Márquez', 1967),
            (2, 'La ciudad y los perros', 'Editorial Alfaguara', 'Mario Vargas Llosa', 1963),
            (3, 'La sombra del viento', 'Editorial Tusquets', 'Isabel Allende', 2001)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE libro_no_relacional
        SQL);
    }
}
