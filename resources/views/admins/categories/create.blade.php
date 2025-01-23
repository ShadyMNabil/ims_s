@extends('layouts.admin')

@section('title')
    {{ __('new_category') }}
@endsection

@section('actions')
    <a class="btn btn-outline-secondary" href="{{ route('admins.categories.index') }}">
        <i class="bi bi-x-circle-fill"></i>
        {{ __('cancel') }}
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form action="{{ route('admins.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="{{ __('name') }}" value="{{ old('name') }}" autofocus required>
                        <label for="name">
                            {{ __('name') }}
                        </label>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            placeholder="{{ __('slug') }}" value="{{ old('slug') }}" required>
                        <label for="slug">
                            {{ __('slug') }}
                        </label>

                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select id="parentId" name="parent_id" class="form-select @error('parent_id') is-invalid @enderror"
                            aria-label="{{ __('parent') }}">
                            @foreach ($categories as $categ)
                                <option value="{{ $categ->id }}" @selected(old('parent_id', $categ->parent_id) == $categ->id)>
                                    {{ $categ->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="parentId">{{ __('parent') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea id="description" name="description" class="form-control" placeholder="{{ __('description') }}"
                            style="height: 150px">{{ old('description') }}</textarea>
                        <label for="description">{{ __('description') }}</label>
                    </div>

                    <div class="mb-3">
                        <input id="featuredImage" name="featured_image" type="file"
                            class="form-control @error('featured_image') is-invalid @enderror" aria-label="featured image">

                        @error('featured_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-3 fs-5">
                        <input name="is_active" type="hidden" value="0">
                        <input id="isActive" name="is_active"
                            class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox" role="switch"
                            value="1" @checked(old('is_active', 1))>
                        <label for="isActive" class="form-check-label">
                            {{ __('active') }}
                        </label>
                    </div>

                    <button class="btn btn-primary">
                        {{ __('save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
