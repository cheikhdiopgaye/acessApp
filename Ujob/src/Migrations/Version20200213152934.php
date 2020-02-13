<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213152934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, confirmepassword VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, telephone INT NOT NULL, telephone1 INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_offre (user_id INT NOT NULL, offre_id INT NOT NULL, INDEX IDX_4D447D37A76ED395 (user_id), INDEX IDX_4D447D374CC8505A (offre_id), PRIMARY KEY(user_id, offre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, typecontrat VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, secteur VARCHAR(255) NOT NULL, metier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nomentrep VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, adressentrep VARCHAR(255) NOT NULL, descriptionentrep VARCHAR(255) NOT NULL, siteinternet VARCHAR(255) NOT NULL, secteuractivite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE user_offre ADD CONSTRAINT FK_4D447D37A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_offre ADD CONSTRAINT FK_4D447D374CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_offre DROP FOREIGN KEY FK_4D447D37A76ED395');
        $this->addSql('ALTER TABLE user_offre DROP FOREIGN KEY FK_4D447D374CC8505A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A4AEAFEA');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_offre');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE entreprise');
    }
}
