@extends('layouts.admin')

@section('title')
    {{ __('dashboard') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- START STAT BOX --}}
            <div class="py-5">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
                    <div class="col">
                        <div class="p-3 rounded bg-body-teritary bg-primary bg-gradient">
                            <div>
                                <h3 class="fw-bolder display-5">150</h3>
                                <p>
                                    {{ __('reacent orders') }}
                                </p>
                            </div><a href="#"
                                class="fw-bold link-offset-2 link-offset-3-hover link-underline-danger link-underline-opacity-75 link-underline-opacity-0-hover link-body-emphasis">more
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 rounded bg-body-teritary bg-success bg-gradient">
                            <div>
                                <h3 class="fw-bolder display-5">53</h3>
                                <p>
                                    {{ __('reacent products') }}
                                </p>
                            </div><a href="#"
                                class="fw-bold link-offset-2 link-offset-3-hover link-underline-warning link-underline-opacity-75	link-underline-opacity-0-hover link-body-emphasis">more
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 rounded bg-danger bg-gradient">
                            <div>
                                <h3 class="fw-bolder display-5">13</h3>
                                <p>
                                    {{ __('reacent categories') }}
                                </p>
                            </div><a href="#"
                                class="fw-bold link-offset-2 link-offset-3-hover link-underline-primary link-underline-opacity-75 link-underline-opacity-0-hover link-body-emphasis">more
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 rounded bg-body-teritary bg-warning bg-gradient">
                            <div>
                                <h3 class="fw-bolder display-5">44</h3>
                                <p>
                                    {{ __('reacent users') }}
                                </p>
                            </div><a href="#"
                                class="fw-bold link-offset-2 link-offset-3-hover link-underline-success link-underline-opacity-75 link-underline-opacity-0-hover link-body-emphasis">more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END STAT BOX --}}

            <div class="row mb-5">
                <div class="col-lg-7 p-3">
                    <div class="card">
                        <div class="card-header">
                            {{ __('reacent orders') }}
                        </div>
                        <div class="table-responsive small">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            {{ __('product') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('price') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('sold') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('remained') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ __('product name') }}</td>
                                            <td>150</td>
                                            <td>20700</td>
                                            <td>18300</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ __('total' . ': ') }}
                            <kbd>
                                <bdi>
                                    35,000
                                </bdi>
                            </kbd>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-3">
                    <div class="card">
                        <div class="card-header">
                            {{ __('new arrivals') }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @for ($i = 1; $i <= 5; $i++)
                                <a href="#"class="list-group-item list-group-item-action">
                                    {{ __('product' . ' ' . $i) }}
                                    <div class="badge rounded-pill bg-primary bg-gradient">
                                        45
                                    </div>
                                </a>
                            @endfor
                        </ul>
                        <div class="card-footer">
                            {{ __('total' . ': ') }}
                            <kbd>
                                <bdi>
                                    35,000
                                </bdi>
                            </kbd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
