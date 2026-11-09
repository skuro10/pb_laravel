<?php

namespace Tests\Feature;

use Tests\TestCase;

class BukuPageTest extends TestCase
{
    public function test_detail_page_displays_the_book_and_related_books(): void
    {
        $response = $this->get('/buku/1');

        $response->assertOk()
            ->assertSee('Belajar PHP')
            ->assertSee('Dasar Laravel')
            ->assertSee('Buku lain dalam kategori pemrograman');
    }

    public function test_detail_page_shows_a_message_when_there_are_no_related_books(): void
    {
        $response = $this->get('/buku/3');

        $response->assertOk()
            ->assertSee('Laskar Pelangi')
            ->assertSee('Belum ada buku lain dalam kategori ini.');
    }

    public function test_unknown_book_id_returns_not_found(): void
    {
        $this->get('/buku/99')->assertNotFound();
    }
}
