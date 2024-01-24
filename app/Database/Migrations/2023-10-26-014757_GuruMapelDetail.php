<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GuruMapelDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'guru_mapel_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'kelas_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
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

        $this->forge->createTable('guru_mapel', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('guru_mapel');
    }
}
