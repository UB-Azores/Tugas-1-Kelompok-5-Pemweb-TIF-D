<?php

# Studi Kasus Tugas Kelompok 5 PHP Object Oriented Programming TIF-D (Magic Methods)
// - Arya Putra Dewantara	205150207111050
// - Naufal Aditya Rohendi	205150201111066
// - Reynaldo Deswara	    205150207111053

# 1. Tambah data tamu (Data tamu yang perlu direkam pada program adalah nama dan asal/alamat)
# 2. Hapus data tamu (Data tamu yang telah terekam dapat dihapus datanya)
# 3. Tampil data tamu (Informasi seluruh data tamu yang telah direkam dapat ditampilkan melalui fungsi ini)
# 4. Keluar dari progam (Fungsi ini digunakan untuk keluar dari aplikasi)

class Tamu{

    private $nama;
    private $alamat;
    private $urutan;

    function __construct($nama, $alamat, $urutan){ // Magic Method __construct()
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->$urutan = $urutan;
    }

    function __toString(){ // Magic Method __toString()
        $tampilan = "Nama\t: {$this->nama}\nAlamat\t: {$this->alamat}\n---------------------------\n";
        return $tampilan;
    }

}

$dataTamu = array(); // Memanggil magic method __set() -> Setiap ada penggunaan sama dengan (=)
$i = 0;

$lanjut = true;
$menu = 0;
while($lanjut){
    echo <<< MENU
    ===========================
    Pilih Menu!!
    1. Tambah Data Tamu
    2. Hapus Data Tamu
    3. Tampil Data Tamu
    4. Keluar
    Pilihan : 
    MENU;
    $menu = readLine();
    echo "===========================";
    
    $temp = 0;
    if($menu == 1){
        echo "\nMasukkan Nama Anda : ";
        $nama = readLine();
        echo "Masukkan Alamat Anda : ";
        $alamat = readLine();

        while(isset($dataTamu[$temp])){ // Memanggil magic method __isset()
            $temp++;
        }
        $dataTamu[$temp] = new Tamu($nama, $alamat, $temp); // Memanggil magic method __construct() di kelas Tamu
        $i++;
        $menu = 0;
    }

    if($menu == 2 || $menu == 3){
        for($temp = 0; $temp < $i; $temp++){
            if(isset($dataTamu[$temp])){ // Memanggil magic method __isset()
                $urutan = $temp + 1;
                echo "\n-------- Tamu Ke-{$urutan} --------\n";
                echo $dataTamu[$temp]; // Memanggil magic method __toString()
            }
        }

        if($menu == 2){
            echo "Data Tamu yang ingin dihapus : ";
            $hapus = readLine();
            unset($dataTamu[$hapus-1]); //Memanggil magic method __unset() dan juga __destruct() -> karena yang diunset berupa objek
        }
        
    }

    if($menu == 4){
        $lanjut = false;
    }
    
}

?>