<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $agendas = Agenda::with('author')->orderBy('start_date', 'desc')->paginate(10);
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(StoreAgendaRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'agendas');
        }

        Agenda::create($data);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'agendas', $agenda->thumbnail);
        }

        $agenda->update($data);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        if ($agenda->thumbnail) {
            $this->imageUploadService->delete($agenda->thumbnail);
        }
        
        $agenda->delete();

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
