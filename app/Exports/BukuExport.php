<?php

namespace App\Exports;

use App\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::all();
    }

    public function map($buku): array
    {
        return [
            $buku->judul,
            $buku->isbn,
            $buku->pengarang,
            $buku->penerbit,
            $buku->tahun_terbit,
            $buku->jumlah_buku,
            $buku->deskripsi,
            $buku->lokasi,
            $buku->cover,
        ];
    }

    public function headings(): array
    {
        return [
            'Judul',
            'ISBN',
            'Pengarang',
            'Penerbit',
            'Tahun Terbit',
            'Stock',
            'Deskripsi',
            'Lokasi',
            'Cover',
        ];
    }
}
