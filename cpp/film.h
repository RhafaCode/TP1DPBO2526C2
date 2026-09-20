#ifndef FILM_H
#define FILM_H

#include <string>

// Class untuk menyimpan data film.
class Film {
private:
    std::string id_film;
    std::string judul;
    std::string genre;
    int harga_tiket;
    std::string poster_path;

public:
    // Mengisi data awal film.
    Film(const std::string& id_film, const std::string& judul, const std::string& genre, int harga_tiket, const std::string& poster_path)
        : id_film(id_film), judul(judul), genre(genre), harga_tiket(harga_tiket), poster_path(poster_path) {}

    // Getter dan setter data film.
    std::string getIdFilm() const { return id_film; }
    std::string getJudul() const { return judul; }
    std::string getGenre() const { return genre; }
    int getHargaTiket() const { return harga_tiket; }
    std::string getPosterPath() const { return poster_path; }
    void setJudul(const std::string& value) { judul = value; }
    void setGenre(const std::string& value) { genre = value; }
    void setHargaTiket(int value) { harga_tiket = value; }
    void setPosterPath(const std::string& value) { poster_path = value; }
};

#endif
