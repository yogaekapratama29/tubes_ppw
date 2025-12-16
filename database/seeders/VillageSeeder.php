<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            [
                'name' => 'Desa Kembaran Wetan',
                'address' => 'Jl. Raya Desa Kembaran Wetan, Kecamatan Kaligondang, Kabupaten Purbalingga, Jawa Tengah 53391',
                'email' => 'info@desakembaranwetan.id',
                'phone' => '0274-1234567',
                'description' => 'Desa Kembaran Wetan merupakan desa yang terletak di dataran rendah Purbalingga dengan pemandangan alam yang indah. Desa ini memiliki potensi pertanian organik, dan kerajinan tangan yang menjadi kebanggaan masyarakat setempat. Dengan penduduk yang ramah dan budaya yang kental, Desa Kembaran Wetan terus berkembang menjadi destinasi wisata unggulan.',
                'image_path' => 'villages/kembaran-wetan.jpg',
                'banner_path' => 'villages/banners/kembaran-wetan-banner.jpg',
            ],
            [
                'name' => 'Desa Tirta Asri',
                'address' => 'Jl. Sumber Mata Air No. 45, Kecamatan Nganjuk, Kabupaten Nganjuk, Jawa Timur 64411',
                'email' => 'admin@tirta-asri.desa.id',
                'phone' => '0358-987654',
                'description' => 'Desa Tirta Asri dikenal dengan sumber mata air alami yang jernih dan sejuk. Desa ini mengembangkan sektor pariwisata berbasis air dengan berbagai fasilitas kolam renang alami dan area rekreasi keluarga. Masyarakat desa juga aktif dalam pengembangan UMKM produk olahan makanan dan minuman berbahan dasar sumber air alami.',
                'image_path' => 'villages/tirta-asri.jpg',
                'banner_path' => 'villages/banners/tirta-asri-banner.jpg',
            ],
            [
                'name' => 'Desa Sawah Lunto',
                'address' => 'Jl. Padi Mas No. 78, Kecamatan Karanganyar, Kabupaten Karanganyar, Jawa Tengah 57711',
                'email' => 'contact@sawahlunto.go.id',
                'phone' => '0271-555123',
                'description' => 'Desa Sawah Lunto adalah sentra pertanian padi dengan hamparan sawah yang luas dan sistem irigasi yang baik. Desa ini menerapkan pertanian modern dengan teknologi smart farming dan menjadi percontohan desa mandiri pangan. Produk beras organik dari desa ini telah tersebar ke berbagai daerah.',
                'image_path' => 'villages/sawah-lunto.jpg',
                'banner_path' => 'villages/banners/sawah-lunto-banner.jpg',
            ],
        ];

        foreach ($villages as $village) {
            Village::updateOrCreate(
                ['email' => $village['email']],
                $village
            );
        }
    }
}
