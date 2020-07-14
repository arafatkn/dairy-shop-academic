<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>@yield('title','Sujon')</h4>
                    <span>@yield('subtitle')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                @foreach ($breadcrumbs as $item)
                    <li class="breadcrumb-item"><a href="{{ $item["url"] }}">{{ $item["name"] }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
