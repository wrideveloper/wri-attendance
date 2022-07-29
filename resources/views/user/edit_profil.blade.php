@extends('layouts.master', ['sectionHeader' => 'Edit Profile'])

@section('content')
{{-- @include('components.konfirmasi', ['text' => 'Apakah Anda yakin ingin memperbarui profil?']) ga tau kenapa, kalau
pakai ini malah ga bisa --}}
<div class="container pb-5 px-4 d-flex flex-column justify-content-center">
    
    {{-- <h5 class="mb-4 mb-md-5">Edit Profile</h5> --}}
    <div class="col-md-12">
        <form class="edit-profil form rounded bg-light py-4 px-5 px-md-5 bg-white py-0 py-md-2" method="POST"
            action="/user/{{ $user->nim }}">
            @method('put')
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label fs-5">Nama</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="Input your name"
                    value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input name="email" id="email" type="text" class="form-control" placeholder="Input your email"
                    value="{{ old('name', $user->email) }}" required>
            </div>
            <div class="col-12">
                <div class="row justify-content-between">
                    <div class="form-group mb-3 col-12 col-md-6 ps-0">
                        <label for="generation" class="form-label fs-5">Angkatan</label>
                        <select name="generations_id" id="generation" class="form-control">
                            @foreach ($generations as $generation)
                            @if (old('generation', $user->generations_id) == $generation->id)
                            <option value="{{ $generation->id }}" selected>{{ $generation->crew_name }}</option>
                            @else
                            <option value="{{ $generation->id }}">{{ $generation->crew_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-12 col-md-6 pe-0">
                        <label for="miniclass" class="form-label fs-5">Miniclass</label>
                        <select name="miniclass_id" id="miniclass" class="form-control">
                            @foreach ($miniclasses as $miniclass)
                            @if (old('miniclass', $user->miniclass_id) == $miniclass->id)
                            <option value="{{ $miniclass->id }}" selected>{{ $miniclass->miniclass_name }}</option>
                            @else
                            <option value="{{ $miniclass->id }}">{{ $miniclass->miniclass_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 position-relative">
                <label for="password" class="form-label fs-5">Password</label>
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="Input your password" autocomplete="" required>
                <button type="button" class="btn border-0 position-absolute bottom-0 end-0"
                    cs-show-password="password"><i class="fa-solid fa-eye-slash"></i></button>
            </div>
            <div class="col-12 d-flex justify-content-end mt-4 p-0">
                <button class="btn btn-teal text-light px-5" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

@section('overrideScript')
<script>
    controlBodyBackgroundColor()
        controlPasswordVisibility()
        controlConfirmationModal()
</script>
@endsection
@endsection