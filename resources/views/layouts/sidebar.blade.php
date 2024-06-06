<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @can('admin')
                <x-nav-item title="Home" icon="fas fa-home" :routes="['home']" />
                <x-nav-item title="Pengembalian Buku" icon="fas fa-book-reader" :routes="['pengembalianbuku.index', 'pengembalianbuku.create', 'pengembalianbuku.edit']" />
                <x-nav-item title="Peminjaman Buku" icon="fas fa-book-open" :routes="['pinjam.index', 'pinjam.create', 'pinjam.edit']" />
                <x-nav-item title="Books" icon="fas fa-book" :routes="['books.index', 'books.create', 'books.edit']" />
                <x-nav-item title="User/Member" icon="fas fa-user-tie" :routes="['user.index', 'user.create', 'user.edit']" />
                @endcan

                @can('member')
                <x-nav-item title="List Buku" icon="fas fa-book" :routes="['listbuku']" />
                <x-nav-item title="History Peminjaman" icon="fas fa-book" :routes="['#']" />
                @endcan
            </ul>
        </nav>
    </div>
</aside>
