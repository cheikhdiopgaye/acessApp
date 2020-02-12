<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200212152402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nomcomplet VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, sexe VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) NOT NULL, confirmpassword VARCHAR(255) DEFAULT NULL, datenaisse DATE DEFAULT NULL, photoprofil VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, descriptionoffre VARCHAR(255) NOT NULL, typecontrat VARCHAR(255) NOT NULL, secteur VARCHAR(255) NOT NULL, metier VARCHAR(255) NOT NULL, INDEX IDX_AF86866FA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_user (offre_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CFC1683D4CC8505A (offre_id), INDEX IDX_CFC1683DA76ED395 (user_id), PRIMARY KEY(offre_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nomentreprise VARCHAR(255) NOT NULL, adresseentreprise VARCHAR(255) NOT NULL, teleentreprise INT NOT NULL, description VARCHAR(255) NOT NULL, statutentreprise VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE offre_user ADD CONSTRAINT FK_CFC1683D4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_user ADD CONSTRAINT FK_CFC1683DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offre_user DROP FOREIGN KEY FK_CFC1683DA76ED395');
        $this->addSql('ALTER TABLE offre_user DROP FOREIGN KEY FK_CFC1683D4CC8505A');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA4AEAFEA');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE offre_user');
        $this->addSql('DROP TABLE entreprise');
    }
}
