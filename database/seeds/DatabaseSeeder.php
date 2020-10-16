<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoribarang')->insert([
            ['kodekategoribarang' => 'KB001', 'namakategoribarang' => 'SIRUP','statuskategoribarang' => 'AKTIF'],
            ['kodekategoribarang' => 'KB002', 'namakategoribarang' => 'PERASA','statuskategoribarang' => 'AKTIF'],
            ['kodekategoribarang' => 'KB003', 'namakategoribarang' => 'PEWARNA','statuskategoribarang' => 'AKTIF'],
            ['kodekategoribarang' => 'KB004', 'namakategoribarang' => 'PEMANIS BUATAN','statuskategoribarang' => 'AKTIF']
        ]);

        DB::table('barang')->insert([
            ['kodebarang' => 'B001', 'namabarang' => 'SIRUP LECI','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '20', 'harga' => '25000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B002', 'namabarang' => 'SIRUP JERUK','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '23', 'harga' => '26000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B003', 'namabarang' => 'SIRUP KOPI','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '30', 'harga' => '21000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B004', 'namabarang' => 'SIRUP KAWISTO','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '15', 'harga' => '21500', 'status'=>'AKTIF'],
            ['kodebarang' => 'B005', 'namabarang' => 'SIRUP MELON','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '10', 'harga' => '16500', 'status'=>'AKTIF'],
            ['kodebarang' => 'B006', 'namabarang' => 'SIRUP VANILI','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '17', 'harga' => '30000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B007', 'namabarang' => 'SIRUP MAWAR','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '8', 'harga' => '1400', 'status'=>'AKTIF'],
            ['kodebarang' => 'B008', 'namabarang' => 'SIRUP COCOPANDAN','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '5', 'harga' => '19000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B009', 'namabarang' => 'SIRUP PISANG SUSU','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '8', 'harga' => '18000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B010', 'namabarang' => 'SIRUP ROS','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '18', 'harga' => '16000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B011', 'namabarang' => 'SIRUP MOKA','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '12', 'harga' => '18500', 'status'=>'AKTIF'],
            ['kodebarang' => 'B012', 'namabarang' => 'SIRUP FRAMBOZEN','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '15', 'harga' => '16000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B013', 'namabarang' => 'SIRUP STROBERI','kodekategoribarang' => 'KB001', 'satuan' => 'BOTOL', 'stok' => '20', 'harga' => '20000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B014', 'namabarang' => 'KARAMEL IV','kodekategoribarang' => 'KB003', 'satuan' => 'BOTOL', 'stok' => '10', 'harga' => '18000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B015', 'namabarang' => 'Karmoisin cl 14720','kodekategoribarang' => 'KB003', 'satuan' => 'BOTOL', 'stok' => '10', 'harga' => '17000', 'status'=>'AKTIF'],
            ['kodebarang' => 'B016', 'namabarang' => 'Tartrazin cl 19140','kodekategoribarang' => 'KB003', 'satuan' => 'BOTOL', 'stok' => '10', 'harga' => '16000', 'status'=>'AKTIF']
        ]);

        DB::table('user')->insert([
            ['username' => 'suparmin001', 'email' => 'suparmin001@gmail.com', 'password' => 'suparmin123', 'nama' => 'SUPARMIN', 'alamat' => 'JLN. PANCAWARNA 001 NO. 05', 'telepon' => '3513914', 'handphone' => '081394056981', 'noktp' => '13453345634567898', 'role' => 'PEGAWAI', 'status' => 'AKTIF'],
            ['username' => 'edisupito11', 'email' => 'edisupito11@gmail.com', 'password' => 'edisupito11', 'nama' => 'EDI SUPITO', 'alamat' => 'JLN. TELAGA WARNA 012', 'telepon' => '3456543', 'handphone' => '082746572837', 'noktp' => '11253335434567898', 'role' => 'PEGAWAI', 'status' => 'AKTIF'],
            ['username' => 'sutarto444', 'email' => 'sutarto444@gmail.com', 'password' => 'sutarto444', 'nama' => 'SUTARTO', 'alamat' => 'JLN. TELOR UNGU 02 NO. 443', 'telepon' => '85746174', 'handphone' => '081463746273', 'noktp' => '15543345634567898', 'role' => 'PEGAWAI', 'status' => 'AKTIF'],
            ['username' => 'salestiwasti22', 'email' => 'salestiwasti22@gmail.com', 'password' => 'salestiwasti22', 'nama' => 'SALESTIWASTI', 'alamat' => 'JLN. PERWIRA ADAM 11 NO. 313', 'telepon' => '3513914', 'handphone' => '081463746273', 'noktp' => '32453333334567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'supriatmo12', 'email' => 'supriatmo12@gmail.com', 'password' => 'supriatmo12', 'nama' => 'SUPRIATMO', 'alamat' => 'JLN. SRIANDRI 44 NO. 121', 'telepon' => '3645373', 'handphone' => '081463746273', 'noktp' => '23453345334567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'udirestiwo01', 'email' => 'udirestiwo01@gmail.com', 'password' => 'udirestiwo01', 'nama' => 'EDIRESTIWO', 'alamat' => 'JLN. SRININDITO 001 NO. 55', 'telepon' => '3857467', 'handphone' => '081463746273', 'noktp' => '11445345634567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'kurniawan002', 'email' => 'kurniawan002@gmail.com', 'password' => 'kurniawan002', 'nama' => 'KURNIAWAN', 'alamat' => 'JLN. MINTOJIWO 001 NO. 09', 'telepon' => '3513914', 'handphone' => '081463746273', 'noktp' => '43253345634567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'ediprasetyo09', 'email' => 'ediprasetyo09@gmail.com', 'password' => 'ediprasetyo09', 'nama' => 'EDI PRASETYO', 'alamat' => 'JLN. JENDRAL SUDIRMAN 001 NO. 05', 'telepon' => '3513914', 'handphone' => '081463746273', 'noktp' => '67653345634567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'rudi123', 'email' => 'rudi123@gmail.com', 'password' => 'rudi123', 'nama' => 'RUDI', 'alamat' => 'JLN. SUPARMAWAN 023 NO. 123', 'telepon' => '3324534', 'handphone' => '081463446273', 'noktp' => '15553345634567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'nurhadi07', 'email' => 'nurhadi07@gmail.com', 'password' => 'nurhadi07', 'nama' => 'NURHADI', 'alamat' => 'JLN. SIMPANG LIMA 001 NO. 98', 'telepon' => '5432456', 'handphone' => '081376556981', 'noktp' => '23453345634567564', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'kuncono0893', 'email' => 'kuncono0893@gmail.com', 'password' => 'kuncono0893', 'nama' => 'KUNCONO', 'alamat' => 'JLN. PURWOKERTO 211 NO. 66', 'telepon' => '2553212', 'handphone' => '081394057651', 'noktp' => '13453345634567898', 'role' => 'SALES PENJUALAN', 'status' => 'AKTIF'],
            ['username' => 'alexandra09', 'email' => 'alexandra09@gmail.com', 'password' => 'alexandra09', 'nama' => 'ALEXANDRA', 'alamat' => 'JLN. KEBANGSAAN 011 NO. 003', 'telepon' => '3513914', 'handphone' => '081394054381', 'noktp' => '54453556444567898', 'role' => 'ADMIN', 'status' => 'AKTIF'],
            ['username' => 'endah75', 'email' => 'endah75@gmail.com', 'password' => 'endah75', 'nama' => 'ENDAH', 'alamat' => 'JLN. INDAH PERMAI 100 NO. 05', 'telepon' => '3453325', 'handphone' => '0813944636981', 'noktp' => '354535645634567898', 'role' => 'ADMIN', 'status' => 'AKTIF']
        ]);

        DB::table('historyharga')->insert([
            ['idhistory' => 'H001', 'kodebarang' => 'B001','tanggalhistory' => '2020-06-03','tanggalberlaku' => '2020-06-29','hargajual' => '29000'],
            ['idhistory' => 'H002', 'kodebarang' => 'B002','tanggalhistory' => '2020-06-03','tanggalberlaku' => '2020-06-25','hargajual' => '24500'],
            ['idhistory' => 'H003', 'kodebarang' => 'B003','tanggalhistory' => '2020-06-05','tanggalberlaku' => '2020-06-20','hargajual' => '26000'],
            ['idhistory' => 'H004', 'kodebarang' => 'B004','tanggalhistory' => '2020-06-05','tanggalberlaku' => '2020-06-19','hargajual' => '28000'],
            ['idhistory' => 'H005', 'kodebarang' => 'B005','tanggalhistory' => '2020-06-05','tanggalberlaku' => '2020-06-20','hargajual' => '20000'],
            ['idhistory' => 'H006', 'kodebarang' => 'B006','tanggalhistory' => '2020-06-04','tanggalberlaku' => '2020-06-18','hargajual' => '19000'],
            ['idhistory' => 'H007', 'kodebarang' => 'B007','tanggalhistory' => '2020-06-04','tanggalberlaku' => '2020-06-17','hargajual' => '27000'],
            ['idhistory' => 'H008', 'kodebarang' => 'B008','tanggalhistory' => '2020-06-04','tanggalberlaku' => '2020-06-30','hargajual' => '16500'],
            ['idhistory' => 'H009', 'kodebarang' => 'B009','tanggalhistory' => '2020-06-06','tanggalberlaku' => '2020-06-24','hargajual' => '18000'],
            ['idhistory' => 'H010', 'kodebarang' => 'B010','tanggalhistory' => '2020-06-06','tanggalberlaku' => '2020-06-22','hargajual' => '24000'],
            ['idhistory' => 'H011', 'kodebarang' => 'B011','tanggalhistory' => '2020-06-06','tanggalberlaku' => '2020-06-21','hargajual' => '23000'],
            ['idhistory' => 'H012', 'kodebarang' => 'B012','tanggalhistory' => '2020-06-08','tanggalberlaku' => '2020-06-19','hargajual' => '21000'],
            ['idhistory' => 'H013', 'kodebarang' => 'B013','tanggalhistory' => '2020-06-10','tanggalberlaku' => '2020-06-15','hargajual' => '22000']
        ]);

        // DB::table('penyesuaianstok')->insert([
        //     ['kodebarangSP' => 'B001', 'stokNow' => '20', 'stokRevisi' => '19', 'keterangan' => 'KARENA BARANG PECAH SAAT DIPERJALANAN'],
        //     ['kodebarangSP' => 'B002', 'stokNow' => '20', 'stokRevisi' => '23', 'keterangan' => 'KARENA KEMASUKAN SEMUT SAAT PENUTUPAN BOTOL'],
        //     ['kodebarangSP' => 'B003', 'stokNow' => '30', 'stokRevisi' => '25', 'keterangan' => 'BOTOL SAAT DISIMPAN KEMASUKAN SEMUT'],
        //     ['kodebarangSP' => 'B004', 'stokNow' => '15', 'stokRevisi' => '14', 'keterangan' => 'BOTOL PECAH'],
        //     ['kodebarangSP' => 'B005', 'stokNow' => '10', 'stokRevisi' => '9', 'keterangan' => 'SAAT PROSES PEMASUKAN CAIRAN TERJADI KEGAGALAN']
        // ]);
    }
}
