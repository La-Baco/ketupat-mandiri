<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Group: Umum
        $groupUmum = SettingGroup::firstOrCreate(
            ['slug' => 'umum'],
            ['name' => 'Umum']
        );

        Setting::firstOrCreate(
            ['key' => 'site_name'],
            ['setting_group_id' => $groupUmum->id, 'label' => 'Nama Website', 'value' => 'Desa Ketupat Mandiri', 'type' => 'text']
        );

        Setting::firstOrCreate(
            ['key' => 'site_description'],
            ['setting_group_id' => $groupUmum->id, 'label' => 'Deskripsi Website Singkat', 'value' => 'Portal Informasi Resmi Desa Ketupat Mandiri', 'type' => 'textarea']
        );

        Setting::firstOrCreate(
            ['key' => 'site_logo'],
            ['setting_group_id' => $groupUmum->id, 'label' => 'Logo Website', 'value' => '', 'type' => 'image']
        );

        // 2. Group: Kontak
        $groupKontak = SettingGroup::firstOrCreate(
            ['slug' => 'kontak'],
            ['name' => 'Kontak']
        );

        Setting::firstOrCreate(
            ['key' => 'contact_email'],
            ['setting_group_id' => $groupKontak->id, 'label' => 'Alamat Email', 'value' => 'pemdes@ketupatmandiri.desa.id', 'type' => 'email']
        );

        Setting::firstOrCreate(
            ['key' => 'contact_phone'],
            ['setting_group_id' => $groupKontak->id, 'label' => 'Nomor Telepon / WhatsApp', 'value' => '081234567890', 'type' => 'text']
        );

        Setting::firstOrCreate(
            ['key' => 'contact_address'],
            ['setting_group_id' => $groupKontak->id, 'label' => 'Alamat Lengkap', 'value' => 'Jl. Balai Desa No. 1, Desa Ketupat Mandiri, Kecamatan Contoh, Kabupaten Contoh', 'type' => 'textarea']
        );

        // 3. Group: Sosial Media
        $groupSosmed = SettingGroup::firstOrCreate(
            ['slug' => 'sosial-media'],
            ['name' => 'Sosial Media']
        );

        Setting::firstOrCreate(
            ['key' => 'social_facebook'],
            ['setting_group_id' => $groupSosmed->id, 'label' => 'Link Facebook', 'value' => 'https://facebook.com/desa', 'type' => 'text']
        );

        Setting::firstOrCreate(
            ['key' => 'social_instagram'],
            ['setting_group_id' => $groupSosmed->id, 'label' => 'Link Instagram', 'value' => 'https://instagram.com/desa', 'type' => 'text']
        );
        
        Setting::firstOrCreate(
            ['key' => 'social_youtube'],
            ['setting_group_id' => $groupSosmed->id, 'label' => 'Link YouTube', 'value' => 'https://youtube.com/desa', 'type' => 'text']
        );
    }
}
