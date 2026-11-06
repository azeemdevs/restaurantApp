<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Main Functions</div>
                    <div class="card-body">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="row text-center">
                            @if (Auth::user()->checkAdmin())
                                <div class="col-sm-4">
                                    <a class="nav-link" href="/management">
                                        <h4>Manage</h4>
                                        <i class="fa-solid fa-list-check fa-2x"></i>
                                    </a>
                                </div>

                            @endif
                            <div class="col-sm-4">
                                <a class="nav-link" href="/cashier">
                                    <h4>Cashier</h4>
                                    <i class="fa-solid fa-cash-register fa-2x"></i>
                                </a>
                            </div>
                            @if (Auth::user()->checkAdmin())
                                <div class="col-sm-4">
                                    <a class="nav-link" href="/report">
                                        <h4>Report</h4>
                                        <i class="fa-solid fa-file fa-2x"></i>
                                    </a>
                                </div>
                            @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
