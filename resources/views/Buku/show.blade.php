<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $buku['judul'] }} - Katalog Buku</title>
</head>
<body>
    <main>
        <a href="{{ route('buku.index') }}">Kembali ke daftar buku</a>

        <article>
            <h1>{{ $buku['judul'] }}</h1>
            <p>Penulis: {{ $buku['penulis'] }}</p>
            <p>
                Kategori:
                <a href="{{ route('buku.kategori', ['nama' => $buku['kategori']]) }}">
                    {{ $buku['kategori'] }}
                </a>
            </p>
        </article>

        <section>
            <h2>Buku lain dalam kategori {{ $buku['kategori'] }}</h2>

            @if (count($bukuTerkait) > 0)
                <ul>
                    @foreach ($bukuTerkait as $bukuLain)
                        <li>
                            <a href="{{ route('buku.show', $bukuLain['id']) }}">
                                {{ $bukuLain['judul'] }}
                            </a>
                            — {{ $bukuLain['penulis'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada buku lain dalam kategori ini.</p>
            @endif
        </section>
    </main>
</body>
</html>
