@extends('admins.layouts.master')

@section('title', 'Contacts')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-email-outline"></i>
            </span>
            Contacts
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    Liste des messages reçus
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Messages de contact</h4>
                </div>
                <div class="card-body">
                    @if ($messages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Sujet</th>
                                        <th>Message</th>
                                        <th>Reçu le</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->phone ?? '—' }}</td>
                                            <td>{{ ucfirst(str_replace('-', ' ', $message->subject)) }}</td>
                                            <td class="text-truncate" style="max-width: 200px;">
                                                {{ $message->message }}
                                            </td>
                                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm view-contact-btn" data-id="{{ $message->id }}">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <form action="{{ route('contact.destroy', $message) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer ce message ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            {{ $messages->links() }}
                        </div>

                        {{-- Modal pour détails --}}
                        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="contactModalLabel">Détails du message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                    </div>
                                    <div class="modal-body" id="contactModalBody">
                                        <!-- Contenu chargé via AJAX -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <p class="text-center">Aucun message reçu pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.view-contact-btn');
            viewButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const modal = new bootstrap.Modal(document.getElementById('contactModal'));
                    const modalBody = document.getElementById('contactModalBody');

                    modal.show();
                    modalBody.innerHTML = `
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                        </div>
                    `;

                    fetch(`/contacts/${id}`, {
                        headers: { 'Accept': 'application/json' }
                    })
                    .then(res => res.json())
                    .then(data => {
                        modalBody.innerHTML = data.html;
                    })
                    .catch(err => {
                        modalBody.innerHTML = `<p class="text-danger">Erreur lors du chargement.</p>`;
                        console.error(err);
                    });
                });
            });
        });
    </script>
@endsection
