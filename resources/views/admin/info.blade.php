@extends('base')

@section('title')
    Modifier une annonce
@endsection



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Validation d'une annonce d'objet retrouv&eacute;</h3>
                    <p class="text-subtitle text-muted">
                        V&eacute;rification de l'annonce et publication.
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Infos d'une annonce
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informations sur l'annonce</h4>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" data-parsley-validate action="{{ route('update', ['annonce' => $notice['id']]) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="annonce_id" value="{{ $notice['id'] }}">

                                    <div class="row mb-2">
                                        <div class="col-3"></div>
                                        <div class="col-6 avatar avatar-3xl justify-content-center">
                                            <img src="{{ asset('assets/logoFall.png') }}" alt="Face 1">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row mt-5">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="libelle_objet" class="form-label">
                                                    Objet perdu
                                                </label>
                                                <input type="text" id="libelle_objet" class="form-control"
                                                    placeholder="Objet perdu" name="libelle_objet"
                                                    data-parsley-required="true" value="{{ $notice['libelle_objet'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="place_of_loss_or_find" class="form-label">
                                                    Lieu de Perte
                                                </label>
                                                <input type="text" id="place_of_loss_or_find" class="form-control"
                                                    placeholder="Lieu de perte" name="place_of_loss_or_find"
                                                    data-parsley-required="true"
                                                    value="{{ $notice['place_of_loss_or_find'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="first_name_person_to_contact" class="form-label">
                                                    Nom de la personne &agrave; contacter
                                                </label>
                                                <input type="text" id="first_name_person_to_contact" class="form-control"
                                                    placeholder="Personne &agrave; pr&eacute;venir"
                                                    name="first_name_person_to_contact" data-parsley-required="true"
                                                    value="{{ $notice['first_name_person_to_contact'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="last_name_person_to_contact" class="form-label">
                                                    Pr&eacute;nom de la personne &agrave; contacter
                                                </label>
                                                <input type="text" id="last_name_person_to_contact" class="form-control"
                                                    placeholder="Personne &agrave; pr&eacute;venir"
                                                    name="last_name_person_to_contact" data-parsley-required="true"
                                                    value="{{ $notice['last_name_person_to_contact'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="telephone_person_to_contact" class="form-label">
                                                    T&eacute;l&eacute;phone de la personne &agrave; contacter
                                                </label>
                                                <input type="text" id="telephone_person_to_contact" class="form-control"
                                                    placeholder="T&eacute;l&eacute;phone de la personne &agrave; contacter"
                                                    name="telephone_person_to_contact" data-parsley-required="true"
                                                    value="{{ $notice['telephone_person_to_contact'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="date_of_loss_or_find" class="form-label">
                                                    Date
                                                </label>
                                                <input type="date" id="date_of_loss_or_find" class="form-control"
                                                    placeholder="Date &agrave; laquelle l'objet &agrave; &eacute;t&eacute; retrouv&eacute;"
                                                    name="date_of_loss_or_find" data-parsley-required="true"
                                                    value="{{ $notice['date_of_loss_or_find'] }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="description_objet" class="form-label">
                                                    Description de l'objet
                                                </label>
                                                <textarea name="description_objet" id="description_objet" rows="5" class="form-control"
                                                    placeholder="Description de l'objet">{{ $notice['description_objet'] }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="type_annonce" class="form-label">
                                                    Type de l'annonce
                                                </label>
                                                <select name="type" id="type_annonce" class="form-control">
                                                    <option>Le type de l'annonce</option>
                                                    <option value="trouve"
                                                        {{ $notice['type'] == 'trouve' ? 'Selected' : '' }}>Objet
                                                        Trouv&eacute;</option>
                                                    <option value="perdu"
                                                        {{ $notice['type'] == 'perdu' ? 'Selected' : '' }}>Objet Perdu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="etat_annonce" class="form-label">
                                                    Etat de l'annonce :
                                                </label>
                                                <input type="checkbox" name="etat" id="etat_annonce"
                                                    class=" ms-3 form-check-input form-check-secondary form-check-glow"
                                                    {{ $notice['actif'] == 1 ? 'Checked' : '' }} disabled>

                                                <span class="ms-5 mb-2">
                                                    Statut de l'annonce :
                                                    <input type="checkbox" name="statut" id="statut_annonce"
                                                        class=" ms-3 form-check-input form-check-secondary form-check-glow"
                                                        {{ $notice['statut'] == 'pupa' ? 'Checked' : '' }} disabled>
                                                    <span
                                                        class="ms-3 text-capitalize badge {{ $notice['statut'] == 'pupa' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $notice['statut'] }}</span>
                                                </span>

                                                <select name="etat" id="type_annonce" class="form-control">
                                                    <option>Etat de l'annonce</option>
                                                    <option value="1" {{ $notice['actif'] == 1 ? 'Selected' : '' }}>
                                                        Active (Publi&eacute;e)</option>
                                                    <option value="0" {{ $notice['actif'] == 0 ? 'Selected' : '' }}>
                                                        Inactive (Non Publi&eacute;e)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 d-flex justify-content-end">
                                            @if ($notice['actif'] == 0)
                                                <a href="{{ route('publish', ['annonce' => $notice['id']]) }}"
                                                    class="btn btn-primary me-5 mb-1">
                                                    Publier
                                                </a>
                                            @endif

                                            @if ($notice['statut'] == 'fall')
                                                <a href="{{ route('done', ['annonce' => $notice['id']]) }}"
                                                    class="btn btn-danger me-5 mb-1">
                                                    Terminer le processus
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-info me-1 ms-3 mb-1">
                                                Modifier
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection



@section('script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/parsley.js') }}"></script>
@endsection
