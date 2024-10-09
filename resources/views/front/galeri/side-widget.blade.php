<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ url('galeri/search/') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari Artikel..." />
                    <button class="btn btn-primary" id="button-search" type="submit">submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    {{-- <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                @foreach ($kategoris as $item)
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ url('kategori/' . $item->slug) }}">{{ $item->nama }}</a></li>
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
            use, and feature the Bootstrap 5 card component!</div>
    </div> --}}
</div>
