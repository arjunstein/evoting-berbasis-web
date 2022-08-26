<?php

use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_pemilih')->insert([
        	'nip' => 'REG001',
        	'nama'=> 'Gambleng',
        	'no_telp' => '085723312772',
        	'alamat' => 'Gardu, Kebon Klapa',
        	'photo' => 'kucing.jpg']);
    	DB::table('m_pemilih')->insert([
        	'nip' => 'REG002',
        	'nama'=> 'Gambleng',
        	'no_telp' => '085723312772',
        	'alamat' => 'Gardu, Kebon Klapa',
        	'photo' => 'kucing.jpg']);
    	DB::table('m_pemilih')->insert([
        	'nip' => 'REG003',
        	'nama'=> 'Gambleng',
        	'no_telp' => '085723312772',
        	'alamat' => 'Gardu, Kebon Klapa',
        	'photo' => 'kucing.jpg']);
    }
}
