<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    public function index()
    {
        $umkmModel = model("UmkmModel");
        $itemModel = model("ItemModel");
        $userModel = model(UserModel::class);

        $data = array(
            'title' => "Dashboard",
            'umkms' => $umkmModel->countAll(),
            'items' => $itemModel->countAll(),
            'users' => $userModel->countAll(),
        );

        return view('dashboard', $data);
    }

    public function edit()
    {
        $data = array(
            'title' => "Edit Akun",
        );

        return view('admin/edit', $data);
    }

    // Digunakan untuk update nama pengguna
    public function update($id = null)
    {
        $userModel = model(UserModel::class);
        if (!$this->validate($userModel->getValidationRules(['only' => ['username']]))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            "id" => $id,
            "username" => $this->request->getPost("username"),
        ];

        $user = new User();

        $user->fill($data);
        $userModel->save($user);

        return redirect()->back()->with('message', "Nama Akun Berhasil Diubah");
    }

    // Fungsi Export ke Excel(Xlsx)
    public function exportData()
    {
        $item_model = model(ItemModel::class);

        $items = $item_model->getAllWithUmkms();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getProperties()
            ->setCreator('Rumah BUMN Denpasar')
            ->setLastModifiedBy('Muhammad Pascal Rahmadi')
            ->setTitle('Data Barang dan UMKM SIPIRANG')
            ->setSubject('Data Barang dan UMKM SIPIRANG')
            ->setDescription('Berisi Data Barang dan UMKM yang ada di database SIPIRANG.')
            ->setKeywords('excel xslx php sipirang barang umkm')
            ->setCategory('data');

        // Change default column dimention wider
        $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);

        // Rename Worksheet 1
        $tabel_barang = $spreadsheet->getActiveSheet()->setTitle("Tabel Barang");

        // Perform Sheet 1 = Items
        $tabel_barang
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Barang')
            ->setCellValue('C1', 'Harga Jual')
            ->setCellValue('D1', 'Harga RB')
            ->setCellValue('E1', 'Qty')
            ->setCellValue('F1', 'Nama Pemberi')
            ->setCellValue('G1', 'Nomor HP Pemberi')
            ->setCellValue('H1', 'Tgl Masuk ')
            ->setCellValue('I1', 'Tgl Kedaluwarsa')
            ->setCellValue('J1', 'Nama Umkm');

        $column = 2;

        foreach ($items as $item) {
            $tabel_barang
                ->setCellValue('A' . $column, $item->item_id)
                ->setCellValue('B' . $column, $item->nama_barang)
                ->setCellValue('C' . $column, (int) $item->harga_jual)
                ->setCellValue('D' . $column, (int) $item->harga_rb)
                ->setCellValue('E' . $column, $item->quantity)
                ->setCellValue('F' . $column, $item->nama_pemberi)
                ->setCellValue('G' . $column, (int) $item->telepon_pemberi)
                ->setCellValue('H' . $column, Date::PHPToExcel($item->created_at))
                ->setCellValue('I' . $column, Date::PHPToExcel($item->expired_at))
                ->setCellValue('J' . $column, $item->nama_umkm);

            $tabel_barang
                ->getStyle('C' . $column . ":D" . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_CURRENCY_RP);

            $tabel_barang
                ->getStyle('G' . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_NUMBER);

            $tabel_barang
                ->getStyle('H' . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYYSLASH);

            $tabel_barang
                ->getStyle('I' . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);

            $column++;
        }

        // Perform Sheet 2 = Umkms
        $tabel_umkm = $spreadsheet->createSheet()->setTitle("Tabel Umkm");
        $spreadsheet->setActiveSheetIndex(1)->getDefaultColumnDimension()->setWidth(15);


        $umkm_model = model('UmkmModel');
        $umkms = $umkm_model->findAll();

        $tabel_umkm
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Nama UMKM')
            ->setCellValue('C1', 'Nomor Telepon UMKM')
            ->setCellValue('D1', 'Alamat')
            ->setCellValue('E1', 'Tgl Input');

        $column = 2;

        foreach ($umkms as $umkm) {
            $tabel_umkm
                ->setCellValue('A' . $column, (int) $umkm->id)
                ->setCellValue('B' . $column, $umkm->nama_umkm)
                ->setCellValue('C' . $column, (int) $umkm->nomor_telepon)
                ->setCellValue('D' . $column, $umkm->alamat)
                ->setCellValue('E' . $column, Date::PHPToExcel($umkm->created_at));

            $tabel_umkm
                ->getStyle('C' . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_NUMBER);

            $tabel_umkm
                ->getStyle('E' . $column)
                ->getNumberFormat()
                ->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYYSLASH);

            $column++;
        }

        $spreadsheet->setActiveSheetIndex(0);

        $writer = new Xlsx($spreadsheet);

        // Nama File: Data Barang dan UMKM_(Tanggal Sekarang)
        $filename = "Data Barang dan UMKM " . date('d-M-Y');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
