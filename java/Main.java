import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {
    // Mencari indeks film berdasarkan ID.
    static int cariFilm(List<Film> daftar, String id) {
        for (int i = 0; i < daftar.size(); i++)
            if (daftar.get(i).getIdFilm().equals(id)) return i;
        return -1;
    }

    // Menampilkan data satu film.
    static void tampilkanFilm(Film data) {
        System.out.printf("%-12s %-25s %-18s %-14d %s%n", data.getIdFilm(), data.getJudul(),
                data.getGenre(), data.getHargaTiket(), data.getPosterPath());
    }

    public static void main(String[] args) {
        // Menyimpan seluruh data film.
        List<Film> daftar = new ArrayList<>();
        Scanner input = new Scanner(System.in);
        int pilihan;

        do {
            System.out.println("\n=== MANAJEMEN FILM BIOSKOP ===\n1. Tambah data\n2. Tampilkan data\n3. Update data\n4. Hapus data\n5. Cari data\n0. Keluar");
            System.out.print("Pilihan: ");
            pilihan = Integer.parseInt(input.nextLine());

            if (pilihan == 1) {
                // Menambahkan data film baru.
                System.out.print("ID film: ");
                String id = input.nextLine();
                if (cariFilm(daftar, id) != -1) {
                    System.out.println("ID sudah digunakan.");
                    continue;
                }
                System.out.print("Judul: "); String judul = input.nextLine();
                System.out.print("Genre: "); String genre = input.nextLine();
                System.out.print("Harga tiket: "); int harga = Integer.parseInt(input.nextLine());
                System.out.print("Path poster lokal: "); String poster = input.nextLine();
                daftar.add(new Film(id, judul, genre, harga, poster));
                System.out.println("Data berhasil ditambahkan.");
            } else if (pilihan == 2) {
                // Menampilkan seluruh data film.
                System.out.printf("%-12s %-25s %-18s %-14s %s%n", "ID", "Judul", "Genre", "Harga", "Poster");
                for (Film data : daftar) tampilkanFilm(data);
                if (daftar.isEmpty()) System.out.println("Belum ada data.");
            } else if (pilihan == 3) {
                // Mengubah data film yang dipilih.
                System.out.print("ID yang diubah: ");
                String id = input.nextLine();
                int index = cariFilm(daftar, id);
                if (index == -1) {
                    System.out.println("Data tidak ditemukan.");
                    continue;
                }
                System.out.print("Judul baru: "); daftar.get(index).setJudul(input.nextLine());
                System.out.print("Genre baru: "); daftar.get(index).setGenre(input.nextLine());
                System.out.print("Harga tiket baru: "); daftar.get(index).setHargaTiket(Integer.parseInt(input.nextLine()));
                System.out.print("Path poster lokal baru: "); daftar.get(index).setPosterPath(input.nextLine());
                System.out.println("Data berhasil diubah.");
            } else if (pilihan == 4) {
                // Menghapus data film yang dipilih.
                System.out.print("ID yang dihapus: ");
                String id = input.nextLine();
                int index = cariFilm(daftar, id);
                if (index == -1) System.out.println("Data tidak ditemukan.");
                else {
                    daftar.remove(index);
                    System.out.println("Data berhasil dihapus.");
                }
            } else if (pilihan == 5) {
                // Mencari dan menampilkan satu film.
                System.out.print("ID yang dicari: ");
                String id = input.nextLine();
                int index = cariFilm(daftar, id);
                if (index == -1) System.out.println("Data tidak ditemukan.");
                else tampilkanFilm(daftar.get(index));
            } else if (pilihan != 0) {
                System.out.println("Pilihan tidak valid.");
            }
        } while (pilihan != 0);

        input.close();
    }
}
