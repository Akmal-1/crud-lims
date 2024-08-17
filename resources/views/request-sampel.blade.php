<!-- resources/views/request-sampel.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Analysis</title>
    <!-- Bootstrap CSS (Lokal) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Tambahkan file CSS custom jika ada -->
    <link rel="stylesheet" href="{{ asset('css/request-sampel.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="logo">
                <img src="{{ asset('images/PT-Timah-Industri.png') }}" alt="Company Logo" class="img-fluid">
            </div>
            <h2 class="text-center">Request Analysis</h2>
        </div>

        <!-- Tampilkan pesan sukses atau error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tampilkan pesan error dari validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('request.sampel.store') }}" method="POST">
            @csrf <!-- Token CSRF untuk keamanan -->

            <button class="btn btn-primary mb-3" id="addSampleBtn" type="button">Add Sample</button>

            <table class="table table-bordered" id="sampleTable">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Tipe Sampel</th>
                        <th>Batch/Lot</th>
                        <th>Deskripsi</th>
                        <th>Nama</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" class="form-control" name="date[]" required></td>
                        <td>
                            <select class="form-select" name="type_sample[]" required>
                                <option value="DMT Line 1">DMT Line 1</option>
                                <option value="DMT Line 2">DMT Line 2</option>
                                <option value="DMT Line 3">DMT Line 3</option>
                                <option value="DMT Line 4">DMT Line 4</option>
                                <option value="DMT Line 5">DMT Line 5</option>
                                <option value="DMT Line 6">DMT Line 6</option>
                                <option value="DMT Line 7">DMT Line 7</option>
                                <option value="DMT Line 8">DMT Line 8</option>
                                <option value="DMT Mixing">DMT Mixing</option>
                                <option value="MTS Reaksi akhir">MTS Reaksi akhir</option>
                                <option value="MTS Settle">MTS Settle</option>
                                <option value="MTS Drying">MTS Drying</option>
                                <option value="MTS Filtrasi">MTS Filtrasi</option>
                                <option value="MTS Sir. storage">MTS Sir. storage</option>
                                <option value="MTS Drumming">MTS Drumming</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="batch_lot[]" placeholder="Input Batch/Lot" required></td>
                        <td><textarea class="form-control" name="description[]" placeholder="Tambahkan Deskripsi Jika ada"></textarea></td>
                        <td><input type="text" class="form-control" name="name[]" placeholder="Nama operator / Staff" required></td>
                        <td class="timestamp">Auto</td>
                        <td><button type="button" class="btn btn-danger btn-delete">Hapus</button></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Send request</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (Lokal) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tambahkan file JS custom jika ada -->
    <script src="{{ asset('js/request-sampel.js') }}"></script>
</body>
</html>
