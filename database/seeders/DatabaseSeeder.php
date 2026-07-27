<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Unit;
use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@timeless.id'],
            [
                'name' => 'Admin Timeless',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Units (17 Units Physical Layout)
        $units = [
            // PS4
            ['unit_id' => 'PS4-01', 'ps_type' => 'ps4', 'label' => 'Unit 1'],
            ['unit_id' => 'PS4-02', 'ps_type' => 'ps4', 'label' => 'Unit 2'],
            ['unit_id' => 'PS4-03', 'ps_type' => 'ps4', 'label' => 'Unit 3'],
            ['unit_id' => 'PS4-04', 'ps_type' => 'ps4', 'label' => 'Unit 4'],
            ['unit_id' => 'PS4-05', 'ps_type' => 'ps4', 'label' => 'Unit 5'],
            // PS5
            ['unit_id' => 'PS5-01', 'ps_type' => 'ps5', 'label' => 'Unit 1'],
            ['unit_id' => 'PS5-02', 'ps_type' => 'ps5', 'label' => 'Unit 2'],
            ['unit_id' => 'PS5-03', 'ps_type' => 'ps5', 'label' => 'Unit 3'],
            ['unit_id' => 'PS5-04', 'ps_type' => 'ps5', 'label' => 'Unit 4'],
            ['unit_id' => 'PS5-05', 'ps_type' => 'ps5', 'label' => 'Unit 5'],
            ['unit_id' => 'PS5-06', 'ps_type' => 'ps5', 'label' => 'Unit 6'],
            ['unit_id' => 'PS5-07', 'ps_type' => 'ps5', 'label' => 'Unit 7'],
            ['unit_id' => 'PS5-08', 'ps_type' => 'ps5', 'label' => 'Unit 8'],
            // PS5 VIP
            ['unit_id' => 'PS5-VIP-01', 'ps_type' => 'ps5Vip', 'label' => 'Ruang 1'],
            ['unit_id' => 'PS5-VIP-02', 'ps_type' => 'ps5Vip', 'label' => 'Ruang 2'],
            ['unit_id' => 'PS5-VIP-03', 'ps_type' => 'ps5Vip', 'label' => 'Ruang 3'],
            ['unit_id' => 'PS5-VIP-04', 'ps_type' => 'ps5Vip', 'label' => 'Ruang 4'],
            ['unit_id' => 'PS5-VIP-05', 'ps_type' => 'ps5Vip', 'label' => 'Ruang 5'],
            // Nintendo VIP
            ['unit_id' => 'NIN-VIP-01', 'ps_type' => 'nintendoVip', 'label' => 'Ruang 1'],
            ['unit_id' => 'NIN-VIP-02', 'ps_type' => 'nintendoVip', 'label' => 'Ruang 2'],
        ];

        foreach ($units as $u) {
            Unit::updateOrCreate(['unit_id' => $u['unit_id']], $u);
        }

        // 3. Games Catalog
        $games = [
            [
                'id' => 'g1',
                'title' => 'GTA V (Grand Theft Auto V)',
                'genre' => 'Action Open-World',
                'platform' => 'PS5 / PS4',
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=500',
                'description' => 'Jelajahi Los Santos bersama Michael, Franklin, dan Trevor dalam petualangan kriminal Open World terhebat sepanjang masa.',
                'player_count' => '1 Pemain / Online Multi',
                'rating' => 'PEGI 18 (Dewasa)',
                'publisher' => 'Rockstar Games',
                'release_year' => 2013,
                'popular_rank' => 1,
            ],
            [
                'id' => 'g2',
                'title' => 'Tekken 8',
                'genre' => 'Fighting',
                'platform' => 'PS5',
                'image_url' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=500',
                'description' => 'Pertarungan keluarga Mishima berlanjut dengan grafik Unreal Engine 5 fantastis dan mekanisme Heat System terbaru.',
                'player_count' => '1-2 Pemain',
                'rating' => 'PEGI 16+',
                'publisher' => 'Bandai Namco',
                'release_year' => 2024,
                'popular_rank' => 2,
            ],
            [
                'id' => 'g3',
                'title' => 'EA Sports FC 26',
                'genre' => 'Olahraga / Sepakbola',
                'platform' => 'PS5 / PS4 / Switch',
                'image_url' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=500',
                'description' => 'Simulasi sepakbola paling realistis dengan teknologi HyperMotionV terbaru dan lisensi klub resmi dunia.',
                'player_count' => '1-4 Pemain',
                'rating' => 'PEGI 3 (Semua Umur)',
                'publisher' => 'EA Sports',
                'release_year' => 2025,
                'popular_rank' => 3,
            ],
            [
                'id' => 'g4',
                'title' => 'God of War Ragnarök',
                'genre' => 'Action Adventure',
                'platform' => 'PS5 / PS4',
                'image_url' => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=500',
                'description' => 'Perjalanan Kratos dan Atreus mengarungi Sembilan Alam Mitologi Nordik menjelang kehancuran akhir zaman.',
                'player_count' => '1 Pemain',
                'rating' => 'PEGI 18',
                'publisher' => 'Sony Interactive',
                'release_year' => 2022,
                'popular_rank' => 4,
            ],
            [
                'id' => 'g5',
                'title' => 'Mario Kart 8 Deluxe',
                'genre' => 'Balapan / Party',
                'platform' => 'Nintendo Switch',
                'image_url' => 'https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?w=500',
                'description' => 'Balapan kart paling seru di konsol Nintendo dengan 48+ sirkuit warna-warni dan item kekuatan ikonik.',
                'player_count' => '1-4 Pemain',
                'rating' => 'PEGI 3',
                'publisher' => 'Nintendo',
                'release_year' => 2017,
                'popular_rank' => 5,
            ],
            [
                'id' => 'g6',
                'title' => 'Cyberpunk 2077: Phantom Liberty',
                'genre' => 'RPG / Sci-Fi',
                'platform' => 'PS5',
                'image_url' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=500',
                'description' => 'Menjadi V di kota masa depan Night City. Petualangan agen rahasia bernuansa futuristik dengan Ray Tracing menakjubkan.',
                'player_count' => '1 Pemain',
                'rating' => 'PEGI 18',
                'publisher' => 'CD Projekt Red',
                'release_year' => 2023,
                'popular_rank' => 6,
            ],
        ];

        foreach ($games as $g) {
            Game::updateOrCreate(['id' => $g['id']], $g);
        }
    }
}
