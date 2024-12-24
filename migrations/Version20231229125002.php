<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229125002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_C35F0816A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, picturecover VARCHAR(255) NOT NULL, create_at DATE NOT NULL, update_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, article_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, created_date DATE NOT NULL, writtername VARCHAR(255) NOT NULL, countries VARCHAR(255) NOT NULL, emailletter VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, productname VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, quantity INT NOT NULL, price INT NOT NULL, picture VARCHAR(255) NOT NULL, create_at DATE NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_users (product_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_B5DFDEB54584665A (product_id), INDEX IDX_B5DFDEB567B3B43D (users_id), PRIMARY KEY(product_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_orders (id INT AUTO_INCREMENT NOT NULL, entreprisename VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, emailadresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, productcategorie VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, quantity VARCHAR(255) NOT NULL, transitelogistics VARCHAR(255) NOT NULL, countries VARCHAR(255) NOT NULL, cities VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prof_account (id INT AUTO_INCREMENT NOT NULL, compname VARCHAR(255) NOT NULL, phonenumber VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, activities VARCHAR(255) NOT NULL, gatewaypay VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_account (id INT AUTO_INCREMENT NOT NULL, shopname VARCHAR(255) NOT NULL, phonenumber VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, gatewaypay VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, categories_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, userstatus VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, favorisproduct VARCHAR(255) NOT NULL, create_at DATE NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, confirm_password VARCHAR(255) NOT NULL, INDEX IDX_1483A5E9A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ware_house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, moreinformation VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBCF5E72D FOREIGN KEY (categorie_id) REFERENCES product_category (id)');
        $this->addSql('ALTER TABLE product_users ADD CONSTRAINT FK_B5DFDEB54584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_users ADD CONSTRAINT FK_B5DFDEB567B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A21214B7 FOREIGN KEY (categories_id) REFERENCES product_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_users DROP FOREIGN KEY FK_B5DFDEB54584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBCF5E72D');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A21214B7');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A76ED395');
        $this->addSql('ALTER TABLE product_users DROP FOREIGN KEY FK_B5DFDEB567B3B43D');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE blog_categorie');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_users');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE product_orders');
        $this->addSql('DROP TABLE prof_account');
        $this->addSql('DROP TABLE shop_account');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE ware_house');
    }
}
