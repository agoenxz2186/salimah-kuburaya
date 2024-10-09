<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ url('Artikel/search/') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari Artikel..." />
                    <button class="btn btn-primary" id="button-search" type="submit">submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Kategori</div>
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
</div>
