<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiSikap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kategori_sikap_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'tahun_ajaran_detail_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'nilai' => [
                'type' => 'SMALLINT',
                'constraint' => 3,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 3,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('nilai_sikap', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('nilai_sikap');
    }
}
