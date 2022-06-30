<?php

// override core en language system validation or define your own en language validation message

return [
  // Core Messages
  'noRuleSets'      => 'Tidak ada aturan yang ditentukan dalam konfigurasi Validasi.',
  'ruleNotFound'    => '{0} bukan sebuah aturan yang valid.',
  'groupNotFound'   => '{0} bukan sebuah grup aturan validasi.',
  'groupNotArray'   => '{0} grup aturan harus berupa sebuah array.',
  'invalidTemplate' => '{0} bukan sebuah template Validasi yang valid.',

  // Rule Messages
  'alpha'                 => 'Bidang ini hanya boleh mengandung karakter alfabet.',
  'alpha_dash'            => 'Bidang ini hanya boleh berisi karakter alfanumerik, setrip bawah, dan tanda pisah.',
  'alpha_numeric'         => 'Bidang ini hanya boleh berisi karakter alfanumerik.',
  'alpha_numeric_punct'   => 'Bidang ini hanya boleh berisi karakter alfanumerik, spasi, dan karakter ~! # $% & * - _ + = | :..',
  'alpha_numeric_space'   => 'Bidang ini hanya boleh berisi karakter alfanumerik dan spasi.',
  'alpha_space'           => 'Bidang ini hanya boleh berisi karakter alfabet dan spasi.',
  'decimal'               => 'Bidang ini harus mengandung sebuah angka desimal.',
  'differs'               => 'Bidang ini harus berbeda dari bidang {param}.',
  'equals'                => 'Bidang ini harus persis: {param}.',
  'exact_length'          => 'Bidang ini harus tepat {param} panjang karakter.',
  'greater_than'          => 'Bidang ini harus berisi sebuah angka yang lebih besar dari {param}.',
  'greater_than_equal_to' => 'Bidang ini harus berisi sebuah angka yang lebih besar atau sama dengan {param}.',
  'hex'                   => 'Bidang ini hanya boleh berisi karakter heksadesimal.',
  'in_list'               => 'Bidang ini harus salah satu dari: {param}.',
  'integer'               => 'Bidang ini harus mengandung bilangan bulat.',
  'is_natural'            => 'Bidang ini hanya boleh berisi angka.',
  'is_natural_no_zero'    => 'Bidang ini hanya boleh berisi angka dan harus lebih besar dari nol.',
  'is_not_unique'         => 'Bidang ini harus berisi nilai yang sudah ada sebelumnya dalam database.',
  'is_unique'             => 'Bidang ini harus mengandung sebuah nilai unik.',
  'less_than'             => 'Bidang ini harus berisi sebuah angka yang kurang dari {param}.',
  'less_than_equal_to'    => 'Bidang ini harus berisi sebuah angka yang kurang dari atau sama dengan {param}.',
  'matches'               => 'Bidang ini tidak cocok dengan bidang {param}.',
  'max_length'            => 'Bidang ini tidak bisa melebihi {param} panjang karakter.',
  'min_length'            => 'Bidang ini setidaknya harus sepanjang {param} karakter.',
  'not_equals'            => 'Bidang ini tidak boleh: {param}.',
  'not_in_list'           => 'Bidang ini tidak boleh salah satu dari: {param}.',
  'numeric'               => 'Bidang ini hanya boleh mengandung angka.',
  'regex_match'           => 'Bidang ini tidak dalam format yang benar.',
  'required'              => 'Bidang ini diperlukan, mohon untuk diisi.',
  'required_with'         => 'Bidang ini diperlukan saat {param} hadir.',
  'required_without'      => 'Bidang ini diperlukan saat {param} tidak hadir.',
  'string'                => 'Bidang ini harus berupa string yang valid.',
  'timezone'              => 'Bidang ini harus berupa sebuah zona waktu yang valid.',
  'valid_base64'          => 'Bidang ini harus berupa sebuah string base64 yang valid.',
  'valid_email'           => 'Bidang ini harus berisi sebuah alamat email yang valid.',
  'valid_emails'          => 'Bidang ini harus berisi semua alamat email yang valid.',
  'valid_ip'              => 'Bidang ini harus berisi sebuah IP yang valid.',
  'valid_url'             => 'Bidang ini harus berisi sebuah URL yang valid.',
  'valid_url_strict'      => 'Bidang ini harus berisi sebuah URL yang valid.',
  'valid_date'            => 'Bidang ini harus berisi sebuah tanggal yang valid.',

  // Credit Cards
  'valid_cc_num' => '{field} tidak tampak sebagai sebuah nomor kartu kredit yang valid.',

  // Files
  'uploaded' => '{field} bukan sebuah berkas diunggah yang valid.',
  'max_size' => '{field} terlalu besar dari sebuah berkas.',
  'is_image' => '{field} bukan berkas gambar diunggah yang valid.',
  'mime_in'  => '{field} tidak memiliki sebuah tipe mime yang valid.',
  'ext_in'   => '{field} tidak memiliki sebuah ekstensi berkas yang valid.',
  'max_dims' => '{field} bukan gambar, atau terlalu lebar atau tinggi.',
];
