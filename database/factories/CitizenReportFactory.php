<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CitizenReport>
 */
class CitizenReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['approved', 'rejected', 'pending'];
        $status = fake()->randomElement($statuses);

        $messages = [
            'Jalan utama desa rusak parah, mohon segera diperbaiki.',
            'Lampu penerangan jalan mati sejak minggu lalu.',
            'Ada penumpukan sampah di RT 03, mohon penanganan.',
            'Air bersih tidak mengalir dua hari terakhir.',
            'Pohon tumbang menghalangi akses ke balai desa.',
        ];

        $responses = [
            'Terima kasih atas laporannya, sedang kami tindak lanjuti.',
            'Tim lapangan dijadwalkan besok pagi.',
            'Laporan diterima, mohon menunggu konfirmasi selanjutnya.',
            'Laporan ditolak karena data kurang lengkap.',
        ];

        $attachments = [
            'attachments/report-1.jpg',
            'attachments/report-2.jpg,attachments/report-2b.png',
            'attachments/report-3.jpg',
            'attachments/report-4.pdf',
            'attachments/report-5.jpg',
        ];

        return [
            'message' => fake()->randomElement($messages),
            'attachment_paths' => fake()->randomElement($attachments),
            'response' => $status === 'pending' ? null : fake()->randomElement($responses),
            'status' => $status,
            'user_id' => fake()->numberBetween(4, 13), // pengguna ids seeded earlier
            'admin_id' => $status === 'pending' ? null : fake()->numberBetween(1, 2), // super admin / admin
        ];
    }
}
