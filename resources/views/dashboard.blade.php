<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Verifikasi Alumni Institut Teknologi Del</title>

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
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full" style="padding: 30px;">
                    <header class="header-style">
                        <img src="{{URL::asset('/images/del.png')}}" class="foto-in"/>
                        <h1 class="font-semibold text-black">Verifikasi Alumni Institut Teknologi Del</h1>
                    </header> 

                    <main class="mt-6">
                        <div class="row custom-row justify-content-center">                        
                            <div class="col-md-5 mr-3 rounded-lg bg-white p-6">
                                <h2 class="font-semibold text-black dark:text-white">Panduan</h2>
                                <div class="relative items-stretch">
                                    <img src="{{URL::asset('/images/ijazah.png')}}" class="template"/>
                                </div>
                            </div>

                            <div class="col-md-7 rounded-lg bg-white p-6">
                                <!-- <div class="col-md-12 col-sm-4"> -->
                                    <h2 class="font-semibold text-black dark:text-white">Form</h2>
                                    @if (session()->has('status'))
                                        <div class="alert alert-danger">
                                            {{ session('pesan') }}
                                        </div>
                                    @endif
                                    
                                    <form method="post" action="/detail" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" id="harga" name="harga" value="$paket->harga_paket">
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-3 text-left card-caption-home">No. Ijazah</div>
                                            <div class="col-md-9">
                                                <div class="number-circle-wrapper input-group">                            
                                                    <div class="rounded-list">1</div>
                                                    <input class="form-control @error('no_ijazah') is-invalid @enderror" type="text" name="no_ijazah" value="{{ old('no_ijazah') }}" />
                                                    @error('no_ijazah')
                                                        <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-3 text-left card-caption-home">NIM</div>
                                            <div class="col-md-9">
                                                <div class="number-circle-wrapper input-group">                            
                                                    <div class="rounded-list">2</div>
                                                    <input class="form-control @error('nim') is-invalid @enderror" type="text"  name="nim" value="{{ old('nim') }}" />                                                
                                                    @error('nim')
                                                        <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-3 text-left card-caption-home">Tanggal Lahir</div>
                                            <div class="col-md-3">
                                                <div class="number-circle-wrapper input-group">                            
                                                    <div class="rounded-list">3</div>
                                                    <input class="form-control @error('tanggal_lahir') is-invalid @enderror" type="number" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal" required/>
                                                </div>
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control @error('bulan_lahir') is-invalid @enderror" type="text" name="bulan_lahir" placeholder="Bulan" required>
                                                    <option value="">Bulan</option>
                                                    @foreach($bulan as $key => $name)
                                                        <option value="{{$key}}" {{ old('bulan_lahir') == $key ? 'selected' : '' }}>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bulan_lahir')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control @error('tahun_lahir') is-invalid @enderror" type="number" name="tahun_lahir" value="{{ old('tahun_lahir') }}" placeholder="Tahun" required/>
                                                @error('tahun_lahir')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-3 text-left card-caption-home">Tanggal Lulus</div>
                                            <div class="col-md-3">
                                                <div class="number-circle-wrapper input-group">                            
                                                    <div class="rounded-list">4</div>
                                                    <input class="form-control @error('tanggal_lulus') is-invalid @enderror" type="number" name="tanggal_lulus" value="{{ old('tanggal_lulus') }}" placeholder="Tanggal" required/>
                                                </div>
                                                @error('tanggal_lulus')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control @error('bulan_lulus') is-invalid @enderror" type="text" name="bulan_lulus" placeholder="Bulan" required>
                                                    <option value="">Bulan</option>
                                                    @foreach($bulan as $key => $name)
                                                        <option value="{{$key}}" {{ old('bulan_lulus') == $key ? 'selected' : '' }}>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bulan_lulus')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control @error('tahun_lulus') is-invalid @enderror" type="number" name="tahun_lulus" value="{{ old('tahun_lulus') }}" placeholder="Tahun" required/>
                                                @error('tahun_lulus')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-3 text-left card-caption-home">Tanggal Terbit</div>
                                            <div class="col-md-3">
                                                <div class="number-circle-wrapper input-group">                            
                                                    <div class="rounded-list">5</div>
                                                    <input class="form-control @error('tanggal_terbit') is-invalid @enderror" type="number" name="tanggal_terbit" value="{{ old('tanggal_terbit') }}" placeholder="Tanggal" required/>
                                                </div>
                                                @error('tanggal_terbit')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control @error('bulan_terbit') is-invalid @enderror" type="text" name="bulan_terbit" placeholder="Bulan" required>
                                                    <option value="">Bulan</option>
                                                    @foreach($bulan as $key => $name)
                                                        <option value="{{$key}}" {{ old('bulan_terbit') == $key ? 'selected' : '' }}>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bulan_terbit')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control @error('tahun_terbit') is-invalid @enderror" type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}" placeholder="Tahun" required/>
                                                @error('tahun_terbit')
                                                    <div class="invalid-feedback" style="text-align:left">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>                                        
                                        <div class="row mt-2 margin-form">
                                            <div class="col-md-12 text-left card-caption-home">Apabila tidak ada tanggal terbit, silakan masukkan tanggal SK</div>
                                        </div>
                                        <div class="row mt-2 margin-form mb-2">
                                            <div class="col-md-12" align="center">
                                                <button class="btn btn-new" id="validate">Verifikasi</button>
                                            </div>
                                        </div>
                                    </form>
                                <!-- </div> -->
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
