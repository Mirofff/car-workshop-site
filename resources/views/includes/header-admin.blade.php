<x-header>
    <div class="d-flex w-100 justify-content-between" style="height: 67px; background: rgba(0, 0, 0, 0.8)">
        <div class="d-flex container align-items-center">
            <x-nav>
                <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">
                    <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}" height="60" alt=""
                         style="filter: invert(1)">
                </a>

                <li class="nav-item">
                    <a href="{{route('pages.admin.requests.index')}}"
                       class="navbar-brand text-light px-2 {{ Route::is('pages.admin.requests.index') ? 'active' : '' }}">
                        {{__('Requests')}}
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown-toggle text-light nav-link px-2" data-bs-toggle="dropdown"
                         aria-expanded="false">{{__('Reports')}}</div>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a class="btn" href="{{route('admin.report.statistic')}}" role="button"
                               aria-expanded="false">{{__('Statistic Report')}}
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn" data-bs-toggle="modal" role="button"
                               data-bs-target="#statistic-report-modal" href="#">Динамический отчет
                            </a>
                        </li>
                    </ul>
                </li>
            </x-nav>
        </div>
    </div>
    <div class="modal fade" id="statistic-report-modal" tabindex="-1" aria-hidden="true"
         aria-labelledby="statistic-report-modal-label">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Dynamic Report')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.report.dynamic')}}">
                    <x-row>
                        <x-row>
                            <div class="col">
                                {{__('Dynamic report creation master')}}
                            </div>
                        </x-row>
                        <x-row>
                            <div class="col">
                                <label class="form-label" for="start-date">{{__('Start date')}}</label>
                                <input class="form-control" type="date" name="start_date" id="start-date" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="end-date">{{__('End date')}}</label>
                                <input class="form-control" type="date" name="end_date" id="end-date" required>
                            </div>
                        </x-row>
                        <x-row>
                            <div class="col">
                            </div>
                            <div class="col d-flex justify-content-center">
                                <x-outline-primary-button type="submit">
                                    {{__("Print")}}
                                </x-outline-primary-button>
                            </div>
                        </x-row>
                    </x-row>
                </form>
            </div>
        </div>
    </div>
</x-header>
