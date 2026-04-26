@extends('template')

@section('main')
    <main class="flex-grow-1 container mt-4">
        <h1 style="font-size: 22px; font-weight: 500; margin-bottom: 20px; color: #1e293b;">Utilisateurs</h1>

        <div class="page-card">
            <div class="card-header-custom">Ajouter un utilisateur</div>
            <form action="{{ route('web.utilisateurs.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Code</label>
                        <input type="text" name="code_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Nom</label>
                        <input type="text" name="nom_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Prénom</label>
                        <input type="text" name="prenom_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Login</label>
                        <input type="text" name="login_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Mot de passe</label>
                        <input type="password" name="password_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Téléphone</label>
                        <input type="text" name="tel_user" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Sexe</label>
                        <select name="sexe_user" class="form-select form-select-sm" required>
                            <option value="">-- Choisir --</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">Rôle</label>
                        <select name="role_user" class="form-select form-select-sm" required>
                            <option value="">-- Choisir --</option>
                            <option value="admin">Admin</option>
                            <option value="technicien">Technicien</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="font-size:12px; color:#64748b;">État</label>
                        <select name="etat_user" class="form-select form-select-sm" required>
                            <option value="">-- Choisir --</option>
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                            <option value="bloque">Bloqué</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn-primary-custom">Ajouter</button>
            </form>
        </div>

        <div class="page-card">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Code</th><th>Nom</th><th>Prénom</th><th>Login</th>
                        <th>Téléphone</th><th>Sexe</th><th>Rôle</th><th>État</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateurs_list as $utilisateur)
                        <tr>
                            <td style="font-size:13px;">{{ $utilisateur->code_user }}</td>
                            <td style="font-size:13px;">{{ $utilisateur->nom_user }}</td>
                            <td style="font-size:13px;">{{ $utilisateur->prenom_user }}</td>
                            <td style="font-size:13px;">{{ $utilisateur->login_user }}</td>
                            <td style="font-size:13px;">{{ $utilisateur->tel_user }}</td>
                            <td style="font-size:13px;">{{ $utilisateur->sexe_user }}</td>
                            <td>
                                @if($utilisateur->role_user === 'admin')
                                    <span class="badge-role-admin">admin</span>
                                @elseif($utilisateur->role_user === 'technicien')
                                    <span class="badge-role-technicien">technicien</span>
                                @else
                                    <span class="badge-role-client">client</span>
                                @endif
                            </td>
                            <td>
                                @if($utilisateur->etat_user === 'actif')
                                    <span class="badge-actif">actif</span>
                                @elseif($utilisateur->etat_user === 'inactif')
                                    <span class="badge-inactif">inactif</span>
                                @else
                                    <span class="badge-bloque">bloqué</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('web.utilisateurs.edit', $utilisateur->code_user) }}"
                                   class="btn-edit-custom">Modifier</a>
                                <form action="{{ route('web.utilisateurs.destroy', $utilisateur->code_user) }}"
                                      method="POST" style="display:inline-block"
                                      onsubmit="return confirm('Supprimer cet utilisateur ?')">
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
            {{ $utilisateurs_list->links() }}
        </div>
    </main>
@endsection
