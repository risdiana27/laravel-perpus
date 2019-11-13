<?php

namespace App\Exports;

use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->kode,
            $transaksi->buku->judul,
            $transaksi->anggota->nama,
            $transaksi->tgl_pinjam,
            $transaksi->tgl_kembali,
            $transaksi->status,
        ];
    }

    public function headings(): array
    {
        return [
        	'Kode',
        	'Judul',
        	'Peminjam',
        	'Tanggal Pinjam',
        	'Tanggal Kembali',
        	'Status',
        ];
    }

}
