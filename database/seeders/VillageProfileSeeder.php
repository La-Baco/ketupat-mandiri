<?php

namespace Database\Seeders;

use App\Models\VillageProfile;
use Illuminate\Database\Seeder;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageProfile::updateOrCreate(
            ['id' => 1],
            [
                'history' => 'Sejarah Desa Ketupat Mandiri dimulai dari sebuah perkampungan kecil yang guyub rukun. Seiring berjalannya waktu, desa ini berkembang menjadi desa yang mandiri, berbudaya, dan sejahtera.',
                'vision' => 'Terwujudnya Desa Ketupat Mandiri yang Sejahtera, Religius, Berbudaya, dan Mandiri.',
                'mission' => "1. Meningkatkan kualitas sumber daya manusia melalui pendidikan dan kesehatan yang memadai.\n2. Mengembangkan potensi ekonomi desa yang berbasis kerakyatan dan usaha mikro.\n3. Meningkatkan infrastruktur desa yang memadai dan berwawasan lingkungan.\n4. Melestarikan nilai-nilai agama, sosial, dan budaya lokal masyarakat.",
                'geography' => 'Desa Ketupat Mandiri terletak di daerah dataran rendah dengan iklim tropis. Sebagian besar wilayah desa dimanfaatkan untuk lahan pertanian, perkebunan, dan pemukiman warga.',
                'area' => '150 Hektar',
                'population' => 2500,
                'families' => 600,
                'hamlets' => 4,
                'rw' => 8,
                'rt' => 24,
                'postal_code' => '12345',
                'latitude' => -6.200000,
                'longitude' => 106.816666,
            ]
        );
    }
}
