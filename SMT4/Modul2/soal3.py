from Lat00P3 import Manusia
class Mahasiswa(Manusia):
    """Class Mahasiswa yang dibangun dari class Manusia."""
    def __init__(self,nama,NIM,kota,us):
        """Metode inisiasi ini menutupi metode inisiasi di class Manusia."""
        self.nama = nama
        self.NIM = NIM
        self.kotaTinggal = kota
        self.uangSaku = us
    def __str__(self):
        s = self.nama + ", NIM " + str(self.NIM) \
            + ". Tinggal di " + self.kotaTinggal \
            + ". Uang saku Rp " + str(self.uangSaku) \
            + " tiap bulannya."
        return s
    def ambilNama(self):
        return self.nama
    def ambilNIM(self):
        return self.NIM
    def ambilUangSaku(self):
        return self.uangSaku
    def makan(self,s):
        """Metode ini menutupi metode ’makan’-nya class Manusia.
        Mahasiswa kalau makan sambil belajar."""
        print("Saya baru saja makan",s,"sambil belajar.")
        self.keadaan = "kenyang"
        
    def ambilKotaTinggal(self):
        print(self.kotaTinggal)
    def perbaruiKotaTinggal(self, kotabaru):
        self.kotaTinggal = kotabaru
    def tambahUangSaku(self, tambahUang):
        self.uangSaku = self.uangSaku + tambahUang

name = input("Siapa nama anda : ")
nim = input("Ketikan NIM anda : ")
city = input("Dimana Kota anda : ")
money = input("Berapa Uang Saku anda : ")
data = Mahasiswa(name, nim, city, money)
print(data)
