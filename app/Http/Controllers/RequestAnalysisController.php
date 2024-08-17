<?php

namespace App\Http\Controllers;

use App\Models\AnalysisRequest; // Pastikan model ini sesuai dengan model yang Anda buat
use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestAnalysisController extends Controller
{
    /**
     * Tampilkan form untuk membuat request analysis.
     */
    public function create()
    {
        return Inertia::render('RequestAnalysis/Create');
    }

    /**
     * Simpan data request analysis ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'samples' => 'required|array',
            'samples.*.date' => 'required|date',
            'samples.*.type_sample' => 'required|string',
            'samples.*.batch_lot' => 'required|string',
            'samples.*.description' => 'nullable|string',
            'samples.*.name' => 'required|string',
        ]);

        // Loop setiap sample dan simpan ke database
        foreach ($request->samples as $sample) {
            AnalysisRequest::create([
                'date' => $sample['date'],
                'type_sample' => $sample['type_sample'],
                'batch_lot' => $sample['batch_lot'],
                'description' => $sample['description'],
                'name' => $sample['name'],
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('request.analysis.create')->with('success', 'Request berhasil disimpan!');
    }
}
