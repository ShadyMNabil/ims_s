@extends('layouts.admin')

@section('title')
    {{ __('show_category') }}
@endsection


@section('actions')
    <a class="btn btn-outline-secondary" href="{{ route('admins.categories.index') }}">
        <i class="bi bi-backspace-fill"></i>
        {{ __('back') }}
    </a>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>
            {{ $category->name }}
        </h1>

        <div>
            <a href="{{ route('admins.categories.edit', $category->slug) }}" class="ms-auto btn btn-sm btn-outline-secondary">
                <i class="bi bi-pencil-fill"></i>
                {{ __('edit') }}
            </a>
            <a href="#" class="btn btn-sm btn-danger"
                onclick="event.preventDefault();if(confirm({{ __('sure_delete?') }})) { document.getElementById('removeCategory-{{ $category->slug }}').submit();}">
                <i class="bi bi-trash3-fill"></i>
                {{ __('delete') }}
            </a>
            <form id="removeCategory-{{ $category->slug }}"
                action="{{ route('admins.categories.destroy', $category->slug) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>


    <div>
        <div class="d-flex justify-content-center mb-3 p-3 border rounded bg-body-tertiary" style="min-height: 25rem">
            <div class="mh-100 d-inline-block">
                <img class="w-100 rounded object-fit-contain" src="{{ Storage::url($category->getFeaturedImage()) }}"
                    alt="{{ __("$category->name featured_image") }}" height="400px">
            </div>
        </div>
    </div>


    <div class="mb-3 border rounded bg-body-tertiary p-3">
        <ul class="list-unstyled">
            <li>
                <strong>{{ __('name') . ': ' }}</strong>
                {{ $category->name }}
            </li>
            <li>
                <strong>{{ __('slug') . ': ' }}</strong>
                {{ $category->slug }}
            </li>
            <li>
                <strong>{{ __('parent') . ': ' }}</strong>
                {{ $category->getParent() }}
            </li>
            <li>
                <strong>{{ __('description') . ': ' }}</strong>
                {{ $category->description }}
            </li>
            <li>
                <strong>{{ __('created_at') . ': ' }}</strong>
                {{ $category->created_at->format('M j, Y H:i:s') }}
            </li>
            <li>
                <strong>{{ __('updated_at') . ': ' }}</strong>
                {{ $category->updated_at->format('M j, Y H:i:s') }}
            </li>
            <li>
                <strong>{{ __('status') . ': ' }}</strong>
                @if ($category->is_active)
                    <i class="bi bi-check-circle-fill text-primary"></i>
                @else
                    {{ __('not_active') }}
                @endif
            </li>
        </ul>
    </div>
@endsection
