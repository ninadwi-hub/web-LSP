<h5 class="mb-4">Menu Admin</h5>
<div class="list-group">

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
        Dashboard
    </a>

    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
        Manajemen Pengguna
    </a>

    <a href="{{ route('kategoris.index') }}" class="list-group-item list-group-item-action">
        Manajemen Kategori
    </a>

    <a href="{{ route('infos.index') }}" class="list-group-item list-group-item-action">
        Manajemen Informasi
    </a>

    <a href="{{ route('pages.index') }}" class="list-group-item list-group-item-action">
        Halaman Statis
    </a>

    <a href="{{ route('galeri.index') }}" class="list-group-item list-group-item-action">
        Galeri
    </a>

    <a href="{{ route('media.index') }}" class="list-group-item list-group-item-action">
        File Download
    </a>

    <a href="{{ route('contacts.index') }}" class="list-group-item list-group-item-action">
        Kontak
    </a>

</div>