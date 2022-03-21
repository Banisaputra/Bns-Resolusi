from Lat00P3 import Manusia
class Mahasiswa(Manusia):
    """Class Mahasiswa yang dibangun dari class Manusia.
        dan menambahkan list kuliah"""
    def __init__(self,nama,NIM,kuliah):
        """Metode inisiasi ini menutupi metode inisiasi di class Manusia."""
        self.nama = nama
        self.NIM = NIM
        self.listKuliah = [kuliah]
    def __str__(self):
        s = self.nama + ", NIM " + str(self.NIM) \
            + ". dan aku mengambil Mata Kuliah : " + str(self.listKuliah)
        return s
    def listkuliah(self):
        return self.daftarKuliah
    def ambilKuliah(self, listKuliah):
        self.listKuliah.append(listKuliah)
        
   
