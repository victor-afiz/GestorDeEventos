<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180521093132 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE delivery (id INTEGER NOT NULL, order_id INTEGER NOT NULL, manager_id INTEGER NOT NULL, date DATETIME NOT NULL, sign VARCHAR(255) DEFAULT NULL, doc_sign VARCHAR(255) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE parent_department (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE clothe (id VARCHAR(50) NOT NULL, clothe_category_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "order" (id INTEGER NOT NULL, user_id VARCHAR(50) NOT NULL, date DATETIME NOT NULL, description VARCHAR(255) DEFAULT NULL, delivery_id INTEGER DEFAULT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user (id VARCHAR(50) NOT NULL, nick_name VARCHAR(255) NOT NULL, name_surname VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, telephone INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, employee_code INTEGER NOT NULL, department_id INTEGER NOT NULL, gender VARCHAR(10) NOT NULL, profiler_details_id INTEGER NOT NULL, contract_id INTEGER NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE log_manager (token VARCHAR(255) NOT NULL, manager_id INTEGER NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(token))');
        $this->addSql('CREATE TABLE manager (id INTEGER NOT NULL, nick_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, rol VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE clothe_size_stock (id INTEGER NOT NULL, clothe_id VARCHAR(50) NOT NULL, size_id VARCHAR(10) NOT NULL, stock INTEGER DEFAULT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE delete_thing (id INTEGER NOT NULL, delete_id VARCHAR(50) NOT NULL, delete_thing_id VARCHAR(50) NOT NULL, name_of_thing VARCHAR(255) NOT NULL, manager_id VARCHAR(50) DEFAULT NULL, user_id VARCHAR(50) DEFAULT NULL, date DATETIME NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department (id INTEGER NOT NULL, parent_department_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contract (id INTEGER NOT NULL, user_id VARCHAR(50) NOT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME NOT NULL, renovation BOOLEAN NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profiler_details (id INTEGER NOT NULL, profiler_id INTEGER NOT NULL, size_name VARCHAR(50) NOT NULL, clothe_category_id VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE log_user (id INTEGER NOT NULL, token VARCHAR(255) NOT NULL, user_id INTEGER NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE order_details (id INTEGER NOT NULL, clothe_size_stock_id INTEGER NOT NULL, order_id INTEGER NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE clothe_category (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, size_type_name VARCHAR(10) NOT NULL, delete_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE parent_department');
        $this->addSql('DROP TABLE clothe');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE log_manager');
        $this->addSql('DROP TABLE manager');
        $this->addSql('DROP TABLE clothe_size_stock');
        $this->addSql('DROP TABLE delete_thing');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE profiler_details');
        $this->addSql('DROP TABLE log_user');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE clothe_category');
    }
}
