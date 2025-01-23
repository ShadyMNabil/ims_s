@extends('layouts.admin')

@section('title')
    {{ __('all_categories') }}
@endsection

@section('actions')
    <a href="{{ route('admins.categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle-fill"></i>
        {{ __('new') }}
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if ($categories->count() === 0)
                <h3>{{ __('no_categories') }}</h3>
            @else
                <div class="mb-3">
                    {{ $categories->onEachSide(0)->links() }}
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless align-middle table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('name') }}</th>
                                <th scope="col">{{ __('slug') }}</th>
                                <th scope="col">{{ __('parent') }}</th>
                                <th scope="col">{{ __('description') }}</th>
                                <th scope="col">{{ __('active') }}</th>
                                <th scope="col" colspan="3">{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">
                                        {{ $category->id }}
                                    </th>
                                    <th scope="row">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ Storage::url($category->getFeaturedImage()) }}"
                                                class="object-fit-cover rounded-circle text-bg-secondary"
                                                alt="{{ __("$category->name featured_image") }}" width="45"
                                                height="45">
                                            {{ $category->name }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $category->slug }}
                                    </td>
                                    <td>
                                        {{ $category->getParent() }}
                                    </td>

                                    <td>
                                        {{ $category->getExcerptDescription() }}
                                    </td>

                                    <td>
                                        @if ($category->is_active)
                                            <i class="bi bi-check-circle-fill text-primary"></i>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admins.categories.show', $category->slug) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admins.categories.edit', $category->slug) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();if(confirm('{{ __('sure_delete?') }}')) {document.getElementById('removeCategory-{{ $loop->iteration }}').submit();}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>

                                        <form id="removeCategory-{{ $loop->iteration }}"
                                            action="{{ route('admins.categories.show', $category->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $categories->onEachSide(0)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
