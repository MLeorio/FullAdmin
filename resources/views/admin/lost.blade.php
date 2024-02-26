@extends('base')
@section('title')
    Objet trouv&eacute;
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des objets perdus</h3>
                    <p class="text-subtitle text-muted">Annonces des objets perdus. Elles sont d&eacute;j&agrave;
                        publi&eacute;es</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Objet perdus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Objets perdus
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1" aria-label="ma table">
                            <thead>
                                <tr>
                                    <th>Num&eacute;ro</th>
                                    <th>Image</th>
                                    <th>Objet</th>
                                    <th>Decription</th>
                                    <th>Lieu de perte</th>
                                    <th>Personne &agrave; contacter</th>
                                    <th>Etat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $notice)
                                    <tr>
                                        <td>{{ $notice['id'] }}</td>
                                        <td></td>
                                        <td>{{ $notice['libelle_objet'] }}</td>
                                        <td>{{ $notice['description_objet'] }}</td>
                                        <td>{{ $notice['place_of_loss_or_find'] }}</td>

                                        <td>{{ $notice['first_name_person_to_contact'] }}
                                            {{ $notice['last_name_person_to_contact'] }}
                                            <span class="ms-2">|</span>
                                            <span class="ms-2">Num : {{ $notice['telephone_person_to_contact'] }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $notice['statut'] == 'fall' ? 'bg-danger' : 'bg-success' }}">
                                                {{ $notice['statut'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                <a href="{{ route('info', ['annonce' => $notice['id']]) }}">
                                                    Voir
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->

    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>
@endsection
