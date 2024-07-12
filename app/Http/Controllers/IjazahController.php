<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IjazahController extends Controller
{
    protected $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
    public function index()
    {
        
        return view('dashboard', ['bulan' => $this->bulan]);
    }

    private function verifyAlumni($no_ijazah, $nim, $tgl_lahir, $tgl_lulus, $tgl_terbit){
        try{
            $API_KEY = env('CIS_ACCESS_KEY');
            $apiUrl = env('CIS_API_URL');
            
            $response = Http::timeout(30)->post($apiUrl, [
                "api_key" => $API_KEY,
                "no_ijazah" => $no_ijazah,
                "nim" => $nim,
                "tgl_lahir" => $tgl_lahir,
                "tgl_lulus" => $tgl_lulus,
                "tgl_terbit" => $tgl_terbit
            ]);
            if ($response->successful()) {
                $result = $response->json();
                
                return [
                    'status' => $result['status'],
                    'pesan' => $result['pesan'],
                    'data' => $result['data'] ?? null,
                ];
            } else {
                return [
                    'status' => 'error',
                    'pesan' => 'Verifikasi gagal',
                    'data' => null,
                ];
            }
        }
        catch(Exception $e){
            return [
                'status' => 'error',
                'pesan' => 'Verifikasi tidak dapat dilakukan saat ini karena masalah jaringan. Silakan coba lagi nanti.',
                'data' => null,
            ];
        }

    }

    public function detail(Request $request)
    {
        $now = date('Y');
        $max_tahun_lahir = $now - 18;

        $request->validate([
            'no_ijazah' => 'required',
            'nim' => 'required',

            'tanggal_lahir' => [
                'required','string','regex:/^(0?[1-9]|[12][0-9]|3[01])$/'
            ],
            'bulan_lahir' => 'required',
            'tahun_lahir' => 'required|integer|min:1975|max:'.$max_tahun_lahir,

            'tanggal_lulus' => [
                'required','string','regex:/^(0?[1-9]|[12][0-9]|3[01])$/'
            ],
            'bulan_lulus' => 'required',
            'tahun_lulus' => 'required|integer|min:2004|max:'.$now,

            'tanggal_terbit' => [
                'required','string','regex:/^(0?[1-9]|[12][0-9]|3[01])$/'
            ],
            'bulan_terbit' => 'required',
            'tahun_terbit' => 'required|integer|min:2004|max:'.$now,
        ], [
            'no_ijazah.required' => 'No. Ijazah harus diisi.',
            'nim.required' => 'Nomor Induk Mahasiswa harus diisi.',

            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi.',
            'tanggal_lulus.required' => 'Tanggal Lulus harus diisi.',
            'tanggal_terbit.required' => 'Tanggal Terbit Ijazah harus diisi.',

            'bulan_lahir.required' => 'Bulan Lahir harus diisi.',
            'bulan_lulus.required' => 'Bulan Lulus harus diisi.',
            'bulan_terbit.required' => 'Bulan Terbit Ijazah harus diisi.',

            'tahun_lahir.required' => 'Tahun Lahir harus diisi.',
            'tahun_lulus.required' => 'Tahun Lulus harus diisi.',
            'tahun_terbit.required' => 'Tahun Terbit Ijazah harus diisi.',

            'tahun_lahir.min' => '1975 - ' . $max_tahun_lahir,
            'tahun_lulus.min' => '2004 - ' . $now,
            'tahun_terbit.min' => '2004 - ' . $now,

            'tahun_lahir.max' => '1975 - ' . $max_tahun_lahir,
            'tahun_lulus.max' => '2004 - ' . $now,
            'tahun_terbit.max' => '2004 - ' . $now,

            'tanggal_lahir.regex' => '1-31.',
            'tanggal_lulus.regex' => '1-31.',
            'tanggal_terbit.regex' => '1-31.',

        ]);
        
        $tl = $request->input('tanggal_lahir');
        $bl = $request->input('bulan_lahir');
        $thl = $request->input('tahun_lahir');
        
        $tlu = $request->input('tanggal_lulus');
        $blu = $request->input('bulan_lulus');
        $thlu = $request->input('tahun_lulus');
        
        
        $tt = $request->input('tanggal_terbit');
        $bt = $request->input('bulan_terbit');
        $tht = $request->input('tahun_terbit');

        $no_ijazah = $request->input('no_ijazah');
        $nim = $request->input('nim');
        $t_lahir = "$thl-$bl-$tl";
        $t_lulus = "$thlu-$blu-$tlu";
        $t_terbit = "$tht-$bt-$tt";

        $verifikasiAlumni = $this->verifyAlumni($no_ijazah, $nim, $t_lahir, $t_lulus, $t_terbit);

        if($verifikasiAlumni['status'] === 'Sukses'){
            return view('detail', [
                'status' => 'success',
                'pesan' => $verifikasiAlumni['pesan'],
                'data' => $verifikasiAlumni['data'],
            ]);
        }
        else{
            return redirect()->route('cari')->with([
                'status' => 'error',
                'pesan' => $verifikasiAlumni['pesan'],
                'data' => $verifikasiAlumni['data'],
                'bulan' => $this->bulan
            ])->withInput();
        }
    }
}
