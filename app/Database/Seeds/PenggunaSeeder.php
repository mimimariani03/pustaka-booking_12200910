<?php
namespace App\Database\Seeds;

use app\Models\PenggunaModel_12200910;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder_12200910 extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'Mimi',
                'password' => md5('12200910')
            ],
            [
                'nama'     => 'admin',
                'password' => md5('12345')
            ],
            [
                'nama'     => '12200910',
                'password' => md5('MimiMariani')
            ]
        ];

        $p = new PenggunaModel_12200910();
        $p->insertBatch($data);
    }
}