@extends('template')

@section('main')
    <main class="flex-grow-1 container mt-4">
        <h1 style="font-size: 22px; font-weight: 500; margin-bottom: 20px; color: #1e293b;">Compétences</h1>

        <div class="page-card">
            <div class="card-header-custom">Ajouter une compétence</div>
            <form action="{{ route('web.competences.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" style="font-size:12px; color:#64748b;">Label</label>
                    <input type="text" name="label_comp" class="form-control form-control-sm" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size:12px; color:#64748b;">Description</label>
                    <textarea name="description_comp" class="form-control form-control-sm" rows="3"></textarea>
                </div>
                <button type="submit" class="btn-primary-custom">Ajouter</button>
            </form>
        </div>

        <div class="page-card">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Code</th><th>Label</th><th>Description</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competences_list as $competence)
                        <tr>
                            <td style="font-size:13px;">{{ $competence->code_comp }}</td>
                            <td style="font-size:13px;">{{ $competence->label_comp }}</td>
                            <td style="font-size:13px;">{{ $competence->description_comp }}</td>
                            <td>
                                <a href="{{ route('web.competences.edit', $competence->code_comp) }}"
                                   class="btn-edit-custom">Modifier</a>
                                <form action="{{ route('web.competences.destroy', $competence->code_comp) }}"
                                      method="POST" style="display:inline-block"
                                      onsubmit="return confirm('Supprimer cette compétence ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete-custom">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $competences_list->links() }}
        </div>
    </main>
@endsection
