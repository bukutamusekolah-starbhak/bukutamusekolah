<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\DataTamu;
use App\Models\Ruangan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class AbsensiExport implements FromCollection,ShouldAutoSize,WithMapping,WithHeadings,WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return Absensi::with('data_tamus','ruangans')->get();
    }
    public function map($absensis): array
    {
        return [
            $absensis->id,
            $absensis->data_tamus->nama,
            $absensis->keperluan,
            $absensis->ruangans->nama_ruangan,
            $absensis->waktu_kedatangan,
            $absensis->waktu_kepulangan
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama Tamu',
            'Keperluan',
            'Tujuan Ruangan',
            'Waktu Kedatangan',
            'Waktu Kepulangan'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:F17')->applyFromArray([
                    'font' => [
                        // 'bold' => true,
                        'name'=> 'Calibri'
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            }
        ];
    }
}
