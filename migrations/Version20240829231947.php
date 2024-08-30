<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829231947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cow_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE veterinarian_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cow (id INT NOT NULL, farm_id INT NOT NULL, milk_production DOUBLE PRECISION NOT NULL, weekly_feed DOUBLE PRECISION NOT NULL, weight DOUBLE PRECISION NOT NULL, birth DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_99D43F9C65FCFA0D ON cow (farm_id)');
        $this->addSql('CREATE TABLE farm (id INT NOT NULL, name VARCHAR(255) NOT NULL, size DOUBLE PRECISION NOT NULL, manager VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5816D0455E237E06 ON farm (name)');
        $this->addSql('CREATE TABLE farm_veterinarian (farm_id INT NOT NULL, veterinarian_id INT NOT NULL, PRIMARY KEY(farm_id, veterinarian_id))');
        $this->addSql('CREATE INDEX IDX_499A5CC65FCFA0D ON farm_veterinarian (farm_id)');
        $this->addSql('CREATE INDEX IDX_499A5CC804C8213 ON farm_veterinarian (veterinarian_id)');
        $this->addSql('CREATE TABLE veterinarian (id INT NOT NULL, name VARCHAR(255) NOT NULL, crmv INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4E5C18053697FA2C ON veterinarian (crmv)');
        $this->addSql('ALTER TABLE cow ADD CONSTRAINT FK_99D43F9C65FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_veterinarian ADD CONSTRAINT FK_499A5CC65FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_veterinarian ADD CONSTRAINT FK_499A5CC804C8213 FOREIGN KEY (veterinarian_id) REFERENCES veterinarian (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cow_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE veterinarian_id_seq CASCADE');
        $this->addSql('ALTER TABLE cow DROP CONSTRAINT FK_99D43F9C65FCFA0D');
        $this->addSql('ALTER TABLE farm_veterinarian DROP CONSTRAINT FK_499A5CC65FCFA0D');
        $this->addSql('ALTER TABLE farm_veterinarian DROP CONSTRAINT FK_499A5CC804C8213');
        $this->addSql('DROP TABLE cow');
        $this->addSql('DROP TABLE farm');
        $this->addSql('DROP TABLE farm_veterinarian');
        $this->addSql('DROP TABLE veterinarian');
    }
}
