<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705132142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee ADD username VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5D9F75A1F85E0677 ON employee (username)');
        $this->addSql('ALTER TABLE employee-test_group RENAME INDEX fk_employee-test_group_test_group1_idx TO IDX_5887B9286B37D211');
        $this->addSql('ALTER TABLE product CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE test CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE test-group_product DROP has_product_passed_test');
        $this->addSql('ALTER TABLE test-group_product RENAME INDEX fk_test-group_product_product1_idx TO IDX_78BE91054584665A');
        $this->addSql('ALTER TABLE test-test_group DROP percentage, DROP is_test_passed');
        $this->addSql('ALTER TABLE test-test_group RENAME INDEX fk_test-test_group_test1_idx TO IDX_BB63BFC51E5D0459');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_5D9F75A1F85E0677 ON employee');
        $this->addSql('ALTER TABLE employee DROP username, DROP roles, DROP password, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE employee-test_group RENAME INDEX idx_5887b9286b37d211 TO fk_employee-test_group_test_group1_idx');
        $this->addSql('ALTER TABLE product CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE test CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE test-group_product ADD has_product_passed_test TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE test-group_product RENAME INDEX idx_78be91054584665a TO fk_test-group_product_product1_idx');
        $this->addSql('ALTER TABLE test-test_group ADD percentage DOUBLE PRECISION DEFAULT NULL, ADD is_test_passed INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test-test_group RENAME INDEX idx_bb63bfc51e5d0459 TO fk_test-test_group_test1_idx');
    }
}
