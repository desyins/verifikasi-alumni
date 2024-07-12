<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Alumni Institut Teknologi Del</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->        
        <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/app2.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50"> -->
        <div class="bg">
            <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> -->
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full" style="padding:30px">
                    <header class="header-style">
                        <img src="{{URL::asset('/images/del.png')}}" class="foto-in"/>
                        <h1 class="font-semibold text-black">Verifikasi Alumni Institut Teknologi Del</h1>
                    </header>                  

                    <main class="mt-6">
                        <div class="flex-col items-start rounded-lg bg-white lg:p-10 lg:pb-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{URL::asset('/images/alumni.jpg')}}" class="foto"/>
                                </div>
                                <div class="col-md-8">
                                    <h2 class="font-semibold text-black dark:text-white">Data Alumni</h2>
                                    <table border=0 class="text-xl" style="width: 100%;table-layout: fixed">
                                        <tr>
                                            <td>No. Ijazah</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">{{ $data['err_code'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">Desy Isabel Nadya</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk Kependudukan</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">{{ $data['err_desc'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">Batam, 07 Desember 1997</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk Mahasiswa</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">11416002</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Masuk</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">2016</td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">D IV Teknologi Rekayasa Perangkat Lunak</td>
                                        </tr>
                                        <tr>
                                            <td>Fakultas</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">Informatika dan Teknik Elektro</td>
                                        </tr>
                                        <tr>
                                            <td>Gelar</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">Sarjana Terapan Komputer (S.Tr.Kom)</td>
                                        </tr>
                                        <tr>
                                            <td>IPK Lulus</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">3.45</td>
                                        </tr>
                                        <tr>
                                            <td>SKS Lulus</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">146</td>
                                        </tr>
                                        <tr>
                                            <td>Predikat</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">Sangat Memuaskan</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lulus</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">4 Agustus 2020</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Terbit</td>
                                            <td class="td-small">:</td>
                                            <td style="width: auto;">12 September 2020</td>
                                        </tr>
                                        <tr>
                                            <td>Judul Tugas Akhir</td>
                                            <td class="td-small">:</td>
                                            <td style="width: 420px">Batak Toba Character Translation Using Convolutional Neural Network and Single Shot Multibox Detection</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12" align="left">
                                            <a href="{{ url('/') }}" class="btn btn-new" style="font-size: 16px;">Kembali ke Form</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Sumber Daya Informasi IT Del
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
