<div class="container my-3">
  <div class="breadcrumb-container p-3">
    <h1 class="mb-0">Dashboard</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 bg-digitaliz">
        <li class="breadcrumb-item"><a href="/{{ Auth::user()->role }}/dashboard"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="/{{ Auth::user()->role }}/dashboard">Dashboard</a></li>
        @isset($breadcrumbs)
          @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : ''}}">
              <a href="{{ url($breadcrumb['path']) }}">{{ $breadcrumb['title'] }}</a>
            </li>
          @endforeach
        @endisset
      </ol>
    </nav>
  </div>
</div>