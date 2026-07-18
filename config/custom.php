<?php

return [
    // app version
    'version' => '1.21.0',

    // company name
    'company_short' => 'LMGM',
    'company_name' => 'Laris Manis Gemilang Jaya',

    // Product name
    'product_short' => 'SAL',
    'product_name' => 'Semesta Alumunium',

    // API toko
    'TLM_API' => env('TLM_API', 'https://www.tobakumas.com/api'),
    'LMGM_API' => env('LMGM_API', 'https://www.larismanisgemilangjaya.com/api'),

    // Database
    'db01_dbname' => 'lmgm',
    'db01_username' => 'root',
    'db01_password' => '',
    'db02_dbname' => 'lmgm',
    'db02_username' => 'root',
    'db02_password' => '',

    // menu aplikasi
    'menu_urusanumum' => true,
    'menu_kepegawaian' => true,
    'menu_keuangan' => false,
    'menu_pemasaran' => false,
    'menu_gudang' => true,
    'menu_pembelian' => true,
    'menu_penjualan' => false,
    'menu_produksi' => false,
    'menu_pelayanan' => true,
    'menu_pengiriman' => true,

    // list per page
    'list_per_page_opt_1' => 15,
    'list_per_page_opt_2' => 30,
    'list_per_page_opt_3' => 45,

    // always update unit price on purchase
    'selaluUpdateHargaBeli' => true,
    'selaluUpdateHargaJual' => false,

    // purchase order
    'po_prefix' => 'PO',

    // sales order
    'so_prefix' => 'SO',

    // pajak
    'purchase_tax_enable' => false,
    'purchase_tax' => 0.10,
    'sale_tax_enable' => false,
    'sale_tax' => 0.10,

    // maksimum panjang text pada tabel
    'table_max_text_length' => 50,

    // perlu/tidak adanya persetujuan transaksi
    'sale_approval' => false,
    'purchase_approval' => false,
    'stockopname_approval' => true,

    // tingkat approval di master/detail
    'approval_level' => 'detail',

    // operator konversi
    'nilai_tambah' => '1',
    'nilai_kurang' => '2',
    'nilai_bagi' => '3',
    'nilai_kali' => '4',
    'simbol_tambah' => '➕',
    'simbol_kurang' => '➖',
    'simbol_bagi' => '➗',
    'simbol_kali' => '✖️',

    // total_baris_tabel_laporan_suratjalan
    'total_baris_suratjalan' => 17,

    // pdf baris per halaman indikator ganti halaman
    'pdf_line_per_page' => 20,

    // koordinat default peta
    'latitude' => -6.175041629211976,
    'longitude' => 106.82711059461597,
];
