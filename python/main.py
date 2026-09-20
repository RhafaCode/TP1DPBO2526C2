from film import Film


# Mencari indeks film berdasarkan ID.
def cari_film(daftar, id_film):
    for index, film in enumerate(daftar):
        if film.get_id_film() == id_film:
            return index
    return -1


# Menampilkan data satu film.
def tampilkan_film(film):
    print(f"{film.get_id_film():<12}{film.get_judul():<25}{film.get_genre():<18}"
          f"{film.get_harga_tiket():<14}{film.get_poster_path()}")


def main():
    # Menyimpan seluruh data film.
    daftar = []

    while True:
        print("\n=== MANAJEMEN FILM BIOSKOP ===")
        print("1. Tambah data\n2. Tampilkan data\n3. Update data\n4. Hapus data\n5. Cari data\n0. Keluar")
        pilihan = input("Pilihan: ")

        if pilihan == "1":
            # Menambahkan data film baru.
            id_film = input("ID film: ")
            if cari_film(daftar, id_film) != -1:
                print("ID sudah digunakan.")
                continue
            judul = input("Judul: ")
            genre = input("Genre: ")
            harga = int(input("Harga tiket: "))
            poster = input("Path poster lokal: ")
            daftar.append(Film(id_film, judul, genre, harga, poster))
            print("Data berhasil ditambahkan.")
        elif pilihan == "2":
            # Menampilkan seluruh data film.
            print(f"{'ID':<12}{'Judul':<25}{'Genre':<18}{'Harga':<14}Poster")
            for film in daftar:
                tampilkan_film(film)
            if not daftar:
                print("Belum ada data.")
        elif pilihan == "3":
            # Mengubah data film yang dipilih.
            id_film = input("ID yang diubah: ")
            index = cari_film(daftar, id_film)
            if index == -1:
                print("Data tidak ditemukan.")
                continue
            daftar[index].set_judul(input("Judul baru: "))
            daftar[index].set_genre(input("Genre baru: "))
            daftar[index].set_harga_tiket(int(input("Harga tiket baru: ")))
            daftar[index].set_poster_path(input("Path poster lokal baru: "))
            print("Data berhasil diubah.")
        elif pilihan == "4":
            # Menghapus data film yang dipilih.
            id_film = input("ID yang dihapus: ")
            index = cari_film(daftar, id_film)
            if index == -1:
                print("Data tidak ditemukan.")
            else:
                daftar.pop(index)
                print("Data berhasil dihapus.")
        elif pilihan == "5":
            # Mencari dan menampilkan satu film.
            id_film = input("ID yang dicari: ")
            index = cari_film(daftar, id_film)
            if index == -1:
                print("Data tidak ditemukan.")
            else:
                tampilkan_film(daftar[index])
        elif pilihan == "0":
            break
        else:
            print("Pilihan tidak valid.")


if __name__ == "__main__":
    main()
