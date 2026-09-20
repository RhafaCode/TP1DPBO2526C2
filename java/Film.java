// Class untuk menyimpan data film.
public class Film {
    private String id_film;
    private String judul;
    private String genre;
    private int harga_tiket;
    private String poster_path;

    // Mengisi data awal film.
    public Film(String id_film, String judul, String genre, int harga_tiket, String poster_path) {
        this.id_film = id_film;
        this.judul = judul;
        this.genre = genre;
        this.harga_tiket = harga_tiket;
        this.poster_path = poster_path;
    }

    // Getter dan setter data film.
    public String getIdFilm() { return id_film; }
    public String getJudul() { return judul; }
    public String getGenre() { return genre; }
    public int getHargaTiket() { return harga_tiket; }
    public String getPosterPath() { return poster_path; }
    public void setJudul(String value) { judul = value; }
    public void setGenre(String value) { genre = value; }
    public void setHargaTiket(int value) { harga_tiket = value; }
    public void setPosterPath(String value) { poster_path = value; }
}
