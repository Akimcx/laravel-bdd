@extends('base')
@section('title', 'Chaire')
@section('content')
    <main>
        <div class="container mx-auto flex w-[95%] items-center justify-center">
            @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
            <form action="{{ route('chairs.store') }}" method="post" class="card grid w-full grid-cols-2 gap-4">
                @csrf
                <div class="relative text-black">
                    <select class="w-full" name="prof_id" id="prof" required>
                        <option value="">Choisir</option>
                        @foreach ($profs as $prof)
                            <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                        @endforeach
                    </select>
                    <label class="absolute" for="prof">Professeur</label>
                    @error('prof_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative text-black">
                    <select class="w-full" name="fac_id" id="fac" required>
                        <option value="">Choisir</option>
                        @foreach ($facs as $fac)
                            <option value="{{ $fac->id }}">{{ $fac->sigle }}</option>
                        @endforeach
                    </select>
                    <label class="absolute" for="fac">Faculté</label>
                    @error('fac_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative text-black">
                    <select class="w-full" name="vacation" id="vacation" required>
                        <option value="">Choisir</option>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                    <label class="absolute" for="vacation">Vacation</label>
                    @error('vacation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative text-black">
                    <input class="block w-full" type="date" name="dates" id="date" required />
                    <label class="absolute" for="date">Date</label>
                    @error('dates')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 flex items-center justify-center gap-4">
                    <button class="btn btn-primary w-full" id="confirm_new_sheet" type="submit">
                        Ajouter
                    </button>
                    <a href="{{ route('chairs.index') }}" class="btn btn-outline w-full text-center" id="cancel_new_sheet">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </main>
@endsection
