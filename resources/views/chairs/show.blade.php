@extends('base')
@section('title', 'Chaire')
@section('content')
    <main class="fill-white text-white">
        <div class="container mx-auto w-[95%]">
            <section id="content" class="fadeIn">
                <div class="wrapper">
                    @include('chairs.shared.controls')
                    <section class="all" id="all" style="margin-bottom: 1em; display: flex; gap: 1em">
                        <form>
                            <input type="text" name="register" hidden value="<%= JSON.stringify(register) %>" />
                            <button hx-target="#all" hx-post="/api/allStudents" class="btn-prm" id="showAll">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                                Show All
                            </button>
                        </form>
                        <div class="allStudents">
                            <div style="display: flex">
                                <p style="width: 100px">First Name</p>
                                <p>Last Name</p>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-between gap-4">
                        <div class="pills prof">
                            <p class="const">Professeur</p>
                            <p class="let">M. {{ $chair->prof->last_name }}</p>
                        </div>
                        <div class="pills fac">
                            <p class="const">Faculté</p>
                            <p class="let">{{ $chair->fac->sigle }}</p>
                        </div>
                        <div class="pills vacation">
                            <p class="const">Vacation</p>
                            <p class="let">{{ $chair->vacation }}</p>
                        </div>
                        <div class="pills date">
                            <p class="const">Date</p>
                            <p class="let">{{ $chair->dates }}</p>
                        </div>
                    </section>
                    <section class="students">
                        @include('dashboard.shared.flash')
                        <small>
                            {{-- Liste des participants: {{ $students->count() }} --}}
                            enregistrements</small>
                        <div>
                            <div class="grid grid-cols-3">
                                <p class="tcell">
                                    Prénom
                                </p>
                                <p class="tcell">Nom</p>
                                <p class="tcell">Présence</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="trow-wrapper">
                                    <input type="checkbox" name="students" value="<%= students[0].id %>" />
                                    <ul is="chaire-row"></ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        {{ $chair->links }}
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection
