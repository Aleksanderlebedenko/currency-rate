<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241111133400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create currency_rate table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
CREATE TABLE currency_rate
(
    id            INT AUTO_INCREMENT NOT NULL,
    currency      VARCHAR(3)         NOT NULL,
    base_currency VARCHAR(3)         NOT NULL,
    rate          NUMERIC(18, 8)     NOT NULL,
    date          DATETIME           NOT NULL COMMENT '(DC2Type:datetime_immutable)',
    provider      VARCHAR(64)        NOT NULL,
    created_at    DATETIME           NOT NULL COMMENT '(DC2Type:datetime_immutable)',
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE `utf8mb4_unicode_ci`
  ENGINE = InnoDB
        ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE currency_rate');
    }
}
