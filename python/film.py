# Class untuk menyimpan data film.
class Film:
    # Mengisi data awal film.
    def __init__(self, id_film: str, judul: str, genre: str, harga_tiket: int, poster_path: str):
        self._id_film = str(id_film)
        self._judul = str(judul)
        self._genre = str(genre)
        self._harga_tiket = int(harga_tiket)
        self._poster_path = str(poster_path)

    # Getter data film.
    def get_id_film(self):
        return self._id_film

    def get_judul(self):
        return self._judul

    def get_genre(self):
        return self._genre

    def get_harga_tiket(self):
        return self._harga_tiket

    def get_poster_path(self):
        return self._poster_path

    # Setter data film.
    def set_id_film(self, id_film: str):
        self._id_film = str(id_film)

    def set_judul(self, judul: str):
        self._judul = str(judul)

    def set_genre(self, genre: str):
        self._genre = str(genre)

    def set_harga_tiket(self, harga_tiket: int):
        self._harga_tiket = int(harga_tiket)

    def set_poster_path(self, poster_path: str):
        self._poster_path = str(poster_path)
