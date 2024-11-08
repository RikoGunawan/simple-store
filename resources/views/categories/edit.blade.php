@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name', $category->name) }}">
                    </div>


                    <div class="col-12 mt-3">
                        <label class="form-label" for="is_active">Is Active?</label>
                        <select class="form-control @error('is_active') is-invalid @enderror" name="is_active" id="is_active">
                            <option value="1" {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Update</button>
                </div>
            </form>
        </main>
    </div>
@endsection
