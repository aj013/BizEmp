<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130142359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, contact_provider VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts_employees (contacts_id INT NOT NULL, employees_id INT NOT NULL, INDEX IDX_BC21269A719FB48E (contacts_id), INDEX IDX_BC21269A8520A30B (employees_id), PRIMARY KEY(contacts_id, employees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deparment (id INT AUTO_INCREMENT NOT NULL, dept_name VARCHAR(255) DEFAULT NULL, dept_created_date DATETIME DEFAULT NULL, dept_update_date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, deparment_id INT NOT NULL, emp_name VARCHAR(255) NOT NULL, emp_address VARCHAR(255) DEFAULT NULL, emp_created_date DATETIME DEFAULT NULL, emp_update_date DATETIME NOT NULL, INDEX IDX_BA82C300CB217CF9 (deparment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuses (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuses_employees (statuses_id INT NOT NULL, employees_id INT NOT NULL, INDEX IDX_E21724E11259C1FF (statuses_id), INDEX IDX_E21724E18520A30B (employees_id), PRIMARY KEY(statuses_id, employees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacts_employees ADD CONSTRAINT FK_BC21269A719FB48E FOREIGN KEY (contacts_id) REFERENCES contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts_employees ADD CONSTRAINT FK_BC21269A8520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300CB217CF9 FOREIGN KEY (deparment_id) REFERENCES deparment (id)');
        $this->addSql('ALTER TABLE statuses_employees ADD CONSTRAINT FK_E21724E11259C1FF FOREIGN KEY (statuses_id) REFERENCES statuses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statuses_employees ADD CONSTRAINT FK_E21724E18520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacts_employees DROP FOREIGN KEY FK_BC21269A719FB48E');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300CB217CF9');
        $this->addSql('ALTER TABLE contacts_employees DROP FOREIGN KEY FK_BC21269A8520A30B');
        $this->addSql('ALTER TABLE statuses_employees DROP FOREIGN KEY FK_E21724E18520A30B');
        $this->addSql('ALTER TABLE statuses_employees DROP FOREIGN KEY FK_E21724E11259C1FF');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE contacts_employees');
        $this->addSql('DROP TABLE deparment');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE statuses');
        $this->addSql('DROP TABLE statuses_employees');
    }
}
