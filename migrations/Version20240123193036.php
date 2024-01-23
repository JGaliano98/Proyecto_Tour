<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123193036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ruta_item (ruta_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_837FEAD6ABBC4845 (ruta_id), INDEX IDX_837FEAD6126F525E (item_id), PRIMARY KEY(ruta_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ruta_item ADD CONSTRAINT FK_837FEAD6ABBC4845 FOREIGN KEY (ruta_id) REFERENCES ruta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ruta_item ADD CONSTRAINT FK_837FEAD6126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE informe ADD id_tour_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE informe ADD CONSTRAINT FK_7E75E1D9CB702433 FOREIGN KEY (id_tour_id) REFERENCES tour (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E75E1D9CB702433 ON informe (id_tour_id)');
        $this->addSql('ALTER TABLE localidad ADD id_provincia_id INT NOT NULL');
        $this->addSql('ALTER TABLE localidad ADD CONSTRAINT FK_4F68E0106DB054DD FOREIGN KEY (id_provincia_id) REFERENCES provincia (id)');
        $this->addSql('CREATE INDEX IDX_4F68E0106DB054DD ON localidad (id_provincia_id)');
        $this->addSql('ALTER TABLE reserva ADD id_usuario_id INT NOT NULL, ADD id_tour_id INT NOT NULL');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BCB702433 FOREIGN KEY (id_tour_id) REFERENCES tour (id)');
        $this->addSql('CREATE INDEX IDX_188D2E3B7EB2C349 ON reserva (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_188D2E3BCB702433 ON reserva (id_tour_id)');
        $this->addSql('ALTER TABLE ruta ADD id_localidad_id INT NOT NULL, ADD id_usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08C44B109FB FOREIGN KEY (id_localidad_id) REFERENCES localidad (id)');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08C7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C3AEF08C44B109FB ON ruta (id_localidad_id)');
        $this->addSql('CREATE INDEX IDX_C3AEF08C7EB2C349 ON ruta (id_usuario_id)');
        $this->addSql('ALTER TABLE tour ADD id_usuario_id INT NOT NULL, ADD id_ruta_id INT NOT NULL');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F9697EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F9697521E135 FOREIGN KEY (id_ruta_id) REFERENCES ruta (id)');
        $this->addSql('CREATE INDEX IDX_6AD1F9697EB2C349 ON tour (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_6AD1F9697521E135 ON tour (id_ruta_id)');
        $this->addSql('ALTER TABLE valoracion ADD id_tour_id INT NOT NULL, ADD id_reserva_id INT NOT NULL');
        $this->addSql('ALTER TABLE valoracion ADD CONSTRAINT FK_6D3DE0F4CB702433 FOREIGN KEY (id_tour_id) REFERENCES tour (id)');
        $this->addSql('ALTER TABLE valoracion ADD CONSTRAINT FK_6D3DE0F473FBB93F FOREIGN KEY (id_reserva_id) REFERENCES reserva (id)');
        $this->addSql('CREATE INDEX IDX_6D3DE0F4CB702433 ON valoracion (id_tour_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D3DE0F473FBB93F ON valoracion (id_reserva_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ruta_item DROP FOREIGN KEY FK_837FEAD6ABBC4845');
        $this->addSql('ALTER TABLE ruta_item DROP FOREIGN KEY FK_837FEAD6126F525E');
        $this->addSql('DROP TABLE ruta_item');
        $this->addSql('ALTER TABLE localidad DROP FOREIGN KEY FK_4F68E0106DB054DD');
        $this->addSql('DROP INDEX IDX_4F68E0106DB054DD ON localidad');
        $this->addSql('ALTER TABLE localidad DROP id_provincia_id');
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08C44B109FB');
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08C7EB2C349');
        $this->addSql('DROP INDEX IDX_C3AEF08C44B109FB ON ruta');
        $this->addSql('DROP INDEX IDX_C3AEF08C7EB2C349 ON ruta');
        $this->addSql('ALTER TABLE ruta DROP id_localidad_id, DROP id_usuario_id');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F9697EB2C349');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F9697521E135');
        $this->addSql('DROP INDEX IDX_6AD1F9697EB2C349 ON tour');
        $this->addSql('DROP INDEX IDX_6AD1F9697521E135 ON tour');
        $this->addSql('ALTER TABLE tour DROP id_usuario_id, DROP id_ruta_id');
        $this->addSql('ALTER TABLE informe DROP FOREIGN KEY FK_7E75E1D9CB702433');
        $this->addSql('DROP INDEX UNIQ_7E75E1D9CB702433 ON informe');
        $this->addSql('ALTER TABLE informe DROP id_tour_id');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B7EB2C349');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BCB702433');
        $this->addSql('DROP INDEX IDX_188D2E3B7EB2C349 ON reserva');
        $this->addSql('DROP INDEX IDX_188D2E3BCB702433 ON reserva');
        $this->addSql('ALTER TABLE reserva DROP id_usuario_id, DROP id_tour_id');
        $this->addSql('ALTER TABLE valoracion DROP FOREIGN KEY FK_6D3DE0F4CB702433');
        $this->addSql('ALTER TABLE valoracion DROP FOREIGN KEY FK_6D3DE0F473FBB93F');
        $this->addSql('DROP INDEX IDX_6D3DE0F4CB702433 ON valoracion');
        $this->addSql('DROP INDEX UNIQ_6D3DE0F473FBB93F ON valoracion');
        $this->addSql('ALTER TABLE valoracion DROP id_tour_id, DROP id_reserva_id');
    }
}
