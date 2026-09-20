<?php
// Class untuk menyimpan data film.
class Film {
    private string $id_film;
    private string $judul;
    private string $genre;
    private int $harga_tiket;
    private string $poster_path;

    // Mengisi data awal film.
    public function __construct(string $id_film, string $judul, string $genre, int $harga_tiket, string $poster_path) {
        $this->id_film = $id_film;
        $this->judul = $judul;
        $this->genre = $genre;
        $this->harga_tiket = $harga_tiket;
        $this->poster_path = $poster_path;
    }

    // Getter dan setter data film.
    public function getIdFilm(): string { return $this->id_film; }
    public function getJudul(): string { return $this->judul; }
    public function getGenre(): string { return $this->genre; }
    public function getHargaTiket(): int { return $this->harga_tiket; }
    public function getPosterPath(): string { return $this->poster_path; }
    public function setJudul(string $value): void { $this->judul = $value; }
    public function setGenre(string $value): void { $this->genre = $value; }
    public function setHargaTiket(int $value): void { $this->harga_tiket = $value; }
    public function setPosterPath(string $value): void { $this->poster_path = $value; }
}
