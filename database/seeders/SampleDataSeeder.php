<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Quis;
use App\Models\Soal;
use App\Models\NilaiQuis;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Buat quiz sample
        $quiz1 = Quis::create([
            'judul' => 'Quiz Matematika Dasar',
            'total_soal' => 5,
            'waktu_pengerjaan' => 30,
            'deadline' => now()->addDays(7)
        ]);

        $quiz2 = Quis::create([
            'judul' => 'Quiz Bahasa Indonesia',
            'total_soal' => 5,
            'waktu_pengerjaan' => 25,
            'deadline' => now()->addDays(5)
        ]);

        // Buat soal untuk quiz 1
        $soal1 = [
            ['soal' => 'Berapakah hasil dari 5 + 3?', 'option_a' => '6', 'option_b' => '7', 'option_c' => '8', 'option_d' => '9', 'answer' => 'C'],
            ['soal' => 'Berapakah hasil dari 10 - 4?', 'option_a' => '4', 'option_b' => '5', 'option_c' => '6', 'option_d' => '7', 'answer' => 'C'],
            ['soal' => 'Berapakah hasil dari 3 x 4?', 'option_a' => '10', 'option_b' => '11', 'option_c' => '12', 'option_d' => '13', 'answer' => 'C'],
            ['soal' => 'Berapakah hasil dari 15 ÷ 3?', 'option_a' => '3', 'option_b' => '4', 'option_c' => '5', 'option_d' => '6', 'answer' => 'C'],
            ['soal' => 'Berapakah hasil dari 2²?', 'option_a' => '2', 'option_b' => '3', 'option_c' => '4', 'option_d' => '5', 'answer' => 'C'],
        ];

        foreach ($soal1 as $soal) {
            Soal::create([
                'id_quis' => $quiz1->id,
                'soal' => $soal['soal'],
                'option_a' => $soal['option_a'],
                'option_b' => $soal['option_b'],
                'option_c' => $soal['option_c'],
                'option_d' => $soal['option_d'],
                'answer' => $soal['answer']
            ]);
        }

        // Buat soal untuk quiz 2
        $soal2 = [
            ['soal' => 'Apa arti kata "membaca"?', 'option_a' => 'Menulis', 'option_b' => 'Melihat dan memahami tulisan', 'option_c' => 'Mendengar', 'option_d' => 'Berbicara', 'answer' => 'B'],
            ['soal' => 'Sinonim dari kata "besar" adalah?', 'option_a' => 'Kecil', 'option_b' => 'Tinggi', 'option_c' => 'Luas', 'option_d' => 'Panjang', 'answer' => 'C'],
            ['soal' => 'Antonim dari kata "panas" adalah?', 'option_a' => 'Dingin', 'option_b' => 'Hangat', 'option_c' => 'Sejuk', 'option_d' => 'Lembut', 'answer' => 'A'],
            ['soal' => 'Kata "makan" termasuk jenis kata?', 'option_a' => 'Kata benda', 'option_b' => 'Kata kerja', 'option_c' => 'Kata sifat', 'option_d' => 'Kata keterangan', 'answer' => 'B'],
            ['soal' => 'Kalimat "Saya pergi ke sekolah" termasuk kalimat?', 'option_a' => 'Kalimat tanya', 'option_b' => 'Kalimat berita', 'option_c' => 'Kalimat perintah', 'option_d' => 'Kalimat seru', 'answer' => 'B'],
        ];

        foreach ($soal2 as $soal) {
            Soal::create([
                'id_quis' => $quiz2->id,
                'soal' => $soal['soal'],
                'option_a' => $soal['option_a'],
                'option_b' => $soal['option_b'],
                'option_c' => $soal['option_c'],
                'option_d' => $soal['option_d'],
                'answer' => $soal['answer']
            ]);
        }

        // Ambil semua user dengan role 'user'
        $users = User::where('role', 'user')->get();

        // Buat nilai sample untuk setiap user
        foreach ($users as $user) {
            // Nilai untuk quiz 1 (random antara 60-100)
            NilaiQuis::create([
                'id_user' => $user->id,
                'id_quis' => $quiz1->id,
                'total' => rand(60, 100)
            ]);

            // Nilai untuk quiz 2 (random antara 70-95)
            NilaiQuis::create([
                'id_user' => $user->id,
                'id_quis' => $quiz2->id,
                'total' => rand(70, 95)
            ]);
        }
    }
} 