#include <iomanip>
#include <iostream>
#include <string>
#include <vector>
#include "film.h"

using namespace std;

// Mencari indeks film berdasarkan ID.
int cariFilm(const vector<Film>& daftar, const string& id) {
    for (size_t i = 0; i < daftar.size(); ++i)
        if (daftar[i].getIdFilm() == id) return static_cast<int>(i);
    return -1;
}

// Menampilkan data satu film.
void tampilkanFilm(const Film& film) {
    cout << left << setw(12) << film.getIdFilm() << setw(25) << film.getJudul()
         << setw(18) << film.getGenre() << setw(14) << film.getHargaTiket()
         << film.getPosterPath() << '\n';
}

int main() {
    // Menyimpan seluruh data film.
    vector<Film> daftar;
    int pilihan;

    do {
        cout << "\n=== MANAJEMEN FILM BIOSKOP ===\n1. Tambah data\n2. Tampilkan data\n"
             << "3. Update data\n4. Hapus data\n5. Cari data\n0. Keluar\nPilihan: ";
        cin >> pilihan;
        cin.ignore();

        if (pilihan == 1) {
            // Menambahkan data film baru.
            string id, judul, genre, poster;
            int harga;
            cout << "ID film: "; getline(cin, id);
            if (cariFilm(daftar, id) != -1) {
                cout << "ID sudah digunakan.\n";
                continue;
            }
            cout << "Judul: "; getline(cin, judul);
            cout << "Genre: "; getline(cin, genre);
            cout << "Harga tiket: "; cin >> harga; cin.ignore();
            cout << "Path poster lokal: "; getline(cin, poster);
            daftar.emplace_back(id, judul, genre, harga, poster);
            cout << "Data berhasil ditambahkan.\n";
        } else if (pilihan == 2) {
            // Menampilkan seluruh data film.
            cout << left << setw(12) << "ID" << setw(25) << "Judul" << setw(18) << "Genre"
                 << setw(14) << "Harga" << "Poster\n" << string(85, '-') << '\n';
            for (const Film& film : daftar) tampilkanFilm(film);
            if (daftar.empty()) cout << "Belum ada data.\n";
        } else if (pilihan == 3) {
            // Mengubah data film yang dipilih.
            string id, judul, genre, poster;
            int harga;
            cout << "ID yang diubah: "; getline(cin, id);
            int index = cariFilm(daftar, id);
            if (index == -1) {
                cout << "Data tidak ditemukan.\n";
                continue;
            }
            cout << "Judul baru: "; getline(cin, judul);
            cout << "Genre baru: "; getline(cin, genre);
            cout << "Harga tiket baru: "; cin >> harga; cin.ignore();
            cout << "Path poster lokal baru: "; getline(cin, poster);
            daftar[index].setJudul(judul);
            daftar[index].setGenre(genre);
            daftar[index].setHargaTiket(harga);
            daftar[index].setPosterPath(poster);
            cout << "Data berhasil diubah.\n";
        } else if (pilihan == 4) {
            // Menghapus data film yang dipilih.
            string id;
            cout << "ID yang dihapus: "; getline(cin, id);
            int index = cariFilm(daftar, id);
            if (index == -1) cout << "Data tidak ditemukan.\n";
            else {
                daftar.erase(daftar.begin() + index);
                cout << "Data berhasil dihapus.\n";
            }
        } else if (pilihan == 5) {
            // Mencari dan menampilkan satu film.
            string id;
            cout << "ID yang dicari: "; getline(cin, id);
            int index = cariFilm(daftar, id);
            if (index == -1) cout << "Data tidak ditemukan.\n";
            else tampilkanFilm(daftar[index]);
        } else if (pilihan != 0) {
            cout << "Pilihan tidak valid.\n";
        }
    } while (pilihan != 0);

    return 0;
}
