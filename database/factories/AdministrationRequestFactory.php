<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdministrationRequest>
 */
class AdministrationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $letterTypes = ['ktp', 'kk', 'sk'];
        $letterType = fake()->randomElement($letterTypes);
        $statuses = ['approved', 'rejected', 'pending'];
        $status = fake()->randomElement($statuses);

        $messages = [
            'ktp' => [
                'Mohon dibuatkan KTP baru karena KTP lama hilang',
                'Permohonan pembuatan KTP untuk anggota keluarga baru',
                'KTP rusak, mohon dibuatkan yang baru',
                'Pembuatan KTP pertama kali untuk anak yang sudah berumur 17 tahun',
            ],
            'kk' => [
                'Permohonan pembuatan Kartu Keluarga baru karena pindah rumah',
                'KK hilang, mohon dibuatkan yang baru',
                'Perubahan data KK karena ada anggota keluarga baru',
                'Pembuatan KK baru setelah menikah',
            ],
            'sk' => [
                'Permohonan Surat Keterangan Tidak Mampu untuk beasiswa',
                'Surat Keterangan Domisili untuk keperluan administrasi',
                'Surat Keterangan Usaha untuk pengajuan kredit',
                'Surat Keterangan Kelahiran untuk anak yang baru lahir',
            ],
        ];

        $responses = [
            'approved' => [
                'Permohonan Anda telah disetujui. Silakan ambil dokumen di kantor desa pada hari kerja.',
                'Dokumen sudah siap. Mohon bawa KTP asli saat pengambilan.',
                'Permohonan disetujui. Dokumen dapat diambil mulai besok.',
            ],
            'rejected' => [
                'Permohonan ditolak karena dokumen persyaratan tidak lengkap.',
                'Mohon maaf, data yang Anda berikan tidak sesuai dengan database kami.',
                'Permohonan ditolak. Silakan lengkapi berkas persyaratan terlebih dahulu.',
            ],
            'pending' => [
                null,
            ],
        ];

        return [
            'letter_type' => $letterType,
            'message' => fake()->randomElement($messages[$letterType]),
            'response' => $status === 'pending' ? null : fake()->randomElement($responses[$status]),
            'status' => $status,
            'user_id' => fake()->numberBetween(4, 13), // Users with role 'pengguna' (id 4-13)
            'admin_id' => $status === 'pending' ? null : fake()->numberBetween(1, 2), // Super admin or admin
        ];
    }
}
