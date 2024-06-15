<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240614191350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, element_id_id INT DEFAULT NULL, nb_people INT DEFAULT NULL, begin_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_date DATETIME DEFAULT NULL, price VARCHAR(255) NOT NULL, price_total VARCHAR(255) DEFAULT NULL, INDEX IDX_E00CEDDE9D86650F (user_id_id), INDEX IDX_E00CEDDEBB66EACE (element_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, info VARCHAR(255) DEFAULT NULL, image_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, element_type_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, cotegorie_id_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, locate VARCHAR(255) DEFAULT NULL, price VARCHAR(255) DEFAULT NULL, size VARCHAR(255) NOT NULL, created_date DATETIME DEFAULT NULL, verified TINYINT(1) DEFAULT NULL, exact_locate VARCHAR(255) DEFAULT NULL, desired VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, INDEX IDX_41405E39DD5CEBCE (element_type_id_id), INDEX IDX_41405E399D86650F (user_id_id), INDEX IDX_41405E3941A72607 (cotegorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ficon (id INT AUTO_INCREMENT NOT NULL, site_id_id INT DEFAULT NULL, icon_primary VARCHAR(255) DEFAULT NULL, icon_secondary VARCHAR(255) DEFAULT NULL, icon_tertiary VARCHAR(255) DEFAULT NULL, icon_quatermary VARCHAR(255) DEFAULT NULL, INDEX IDX_94808337BB1E4E52 (site_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fproperty (id INT AUTO_INCREMENT NOT NULL, site_id_id INT DEFAULT NULL, property_primary VARCHAR(255) DEFAULT NULL, property_secondary VARCHAR(255) DEFAULT NULL, property_tertiary VARCHAR(255) DEFAULT NULL, property_quatermary VARCHAR(255) DEFAULT NULL, spec VARCHAR(255) DEFAULT NULL, INDEX IDX_27A02F37BB1E4E52 (site_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, element_id_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) DEFAULT NULL, INDEX IDX_C53D045FBB66EACE (element_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, space VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, receiver_id_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_B6BD307F9D86650F (user_id_id), INDEX IDX_B6BD307FBE20CAB0 (receiver_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, element_id_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, surface VARCHAR(255) DEFAULT NULL, INDEX IDX_44CA0B23BB66EACE (element_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece_item (id INT AUTO_INCREMENT NOT NULL, piece_id_id INT DEFAULT NULL, item_id_id INT DEFAULT NULL, quantity VARCHAR(255) DEFAULT NULL, INDEX IDX_1B731E476DF71F3C (piece_id_id), INDEX IDX_1B731E4755E38587 (item_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, mis_ajour VARCHAR(255) DEFAULT NULL, owner VARCHAR(255) DEFAULT NULL, likes VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, site_id_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, paragraphe VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, primary_color VARCHAR(255) DEFAULT NULL, secondary_color VARCHAR(255) DEFAULT NULL, police VARCHAR(255) DEFAULT NULL, INDEX IDX_33BDB86ABB1E4E52 (site_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, site_id_id INT DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, full_name VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, age VARCHAR(255) DEFAULT NULL, img_url VARCHAR(255) DEFAULT NULL, badge VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649BB1E4E52 (site_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEBB66EACE FOREIGN KEY (element_id_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39DD5CEBCE FOREIGN KEY (element_type_id_id) REFERENCES element_type (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E399D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E3941A72607 FOREIGN KEY (cotegorie_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE ficon ADD CONSTRAINT FK_94808337BB1E4E52 FOREIGN KEY (site_id_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE fproperty ADD CONSTRAINT FK_27A02F37BB1E4E52 FOREIGN KEY (site_id_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBB66EACE FOREIGN KEY (element_id_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FBE20CAB0 FOREIGN KEY (receiver_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B23BB66EACE FOREIGN KEY (element_id_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE piece_item ADD CONSTRAINT FK_1B731E476DF71F3C FOREIGN KEY (piece_id_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE piece_item ADD CONSTRAINT FK_1B731E4755E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE style ADD CONSTRAINT FK_33BDB86ABB1E4E52 FOREIGN KEY (site_id_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BB1E4E52 FOREIGN KEY (site_id_id) REFERENCES site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE9D86650F');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEBB66EACE');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39DD5CEBCE');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E399D86650F');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E3941A72607');
        $this->addSql('ALTER TABLE ficon DROP FOREIGN KEY FK_94808337BB1E4E52');
        $this->addSql('ALTER TABLE fproperty DROP FOREIGN KEY FK_27A02F37BB1E4E52');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBB66EACE');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9D86650F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FBE20CAB0');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B23BB66EACE');
        $this->addSql('ALTER TABLE piece_item DROP FOREIGN KEY FK_1B731E476DF71F3C');
        $this->addSql('ALTER TABLE piece_item DROP FOREIGN KEY FK_1B731E4755E38587');
        $this->addSql('ALTER TABLE style DROP FOREIGN KEY FK_33BDB86ABB1E4E52');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BB1E4E52');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE element_type');
        $this->addSql('DROP TABLE ficon');
        $this->addSql('DROP TABLE fproperty');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE piece');
        $this->addSql('DROP TABLE piece_item');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE user');
    }
}
