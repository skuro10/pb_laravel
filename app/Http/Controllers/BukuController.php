<?php

namespace App\Http\Controllers;

class BukuController extends Controller
{
    private function dataBuku(): array
    {
        return [
            ['id' => 1, 'judul' => 'Belajar PHP', 'penulis' => 'Andi', 'kategori' => 'pemrograman'],
            ['id' => 2, 'judul' => 'Dasar Laravel', 'penulis' => 'Budi', 'kategori' => 'pemrograman'],
            ['id' => 3, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'kategori' => 'novel'],
        ];
    }

    public function index()
    {
        return view('Buku.index', ['daftarBuku' => $this->dataBuku()]);
    }

    public function show(string $id)
    {
        $buku = collect($this->dataBuku())->firstWhere('id', (int) $id);
        abort_if($buku === null, 404);

        $bukuTerkait = array_values(array_filter(
            $this->dataBuku(),
            fn (array $item): bool => $item['kategori'] === $buku['kategori']
                && $item['id'] !== $buku['id'],
        ));

        return view('Buku.show', compact('buku', 'bukuTerkait'));
    }

    public function kategori(?string $nama = null)
    {
        $daftarBuku = $this->dataBuku();
        if ($nama !== null) {
            $daftarBuku = array_values(array_filter($daftarBuku, fn ($b) => $b['kategori'] === $nama));
        }

        return view('Buku.kategori', compact('daftarBuku', 'nama'));
    }
}
