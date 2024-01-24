<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAjaranDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tahun_ajaran_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'kelas_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'siswa_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
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

        $this->forge->createTable('tahun_ajaran_detail', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tahun_ajaran_detail');
    }
}
