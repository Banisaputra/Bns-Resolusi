from Lat00P3 import Manusia
class siswaSMA(Manusia):
    """Class siswaSMA yang dibangun dari class Manusia."""
    def __init__(self,nama,absen,jurusan):
        self.nama = nama
        self.absen = absen
        self.jurusan = jurusan
        self.extra = []
    def __str__(self):
        s = "Nama : " + str(self.nama) \
            + ", absen : " + str(self.absen) \
            + ". dan aku mengambil jurusan : " + str(self.jurusan)
        return s
    def ambilAbsen(self):
        return self.absen
    def ambilJurusan(self):
        return self.jurusan
    def extra(self):
        return self.extra
    def tambahExtra(self,x):
        self.extra.append(x)
        
   
