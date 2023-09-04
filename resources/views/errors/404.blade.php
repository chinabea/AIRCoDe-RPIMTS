@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning">404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="{{ url('/') }}">return to the dashboard</a> or try using the search form.
                </p>

                <form class="search-form" method="get" action="{{ url('/search') }}">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search" required>

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
