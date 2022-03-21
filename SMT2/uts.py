####UTS nih Boss
####tekan alt+4 1x saje
##
####No1
##def fib(n): #membuat fungsi bernama "fib" dengan 1 parameter yaitu "n"
##    fib_num = [0,1] #menyimpan list array pada variable "fib_num"
##    for i in range (2,n):
####        perulangan untuk variabel "i" yang ada pada range 2 sampai n,
####        n disini merupakan isi dari parameter yang di inputkan
####        kemudian jalankan sytax berikut
##        fib_num.append(fib_num[i-1]+fib_num[i-2])
####        fib_num[i-1] = merupakan index ke-1 dari array fib_num, karena i dimulai dari 2
####        fib_num[i-2] = merupakan index ke-0 dari array fib_num, karena i dimulai dari 2
####        append = berfungsi untuk menambahkan object kedalam suatu variable
####        maka index ke-1 ditambah index ke-0 dari array fib_num akan ditambahkan pada variable array fib_num
##        
##    return fib_num
####        mengembalikan nilai dari fib_num
##print(fib(6))
####        mencetak hasil dari fungsi fib dengan parameter 6
####        sehingga akan menampilakan "[0,1,1,2,3,5]"



####No2
##class Buku():
##    def __init__(self,jumlah,judul):
##        self.jumlah = jumlah
##        self.judul = judul
##
##    def __str__(self):
##        return "Buku berjudul : "+str(self.judul)+" berjumlah "+str(self.jumlah)
##
##R = Buku(212,"nanti kita cerita tentang UTS")
##R.judul
##R.jumlah
##print(R)
##
####2a
####pembuatan class "Buku" tanpa memiliki parameter, namun terdapat fungsi/method "init dan str"
####dimana fungsi tersebut automatis akan dijalankan ketika class itu digunakan
####dalam fungsi init terdapat 2 parameter yaitu jumlah dan judul,yang mana parameter jumlah dan judul
####akan disimpan pada variable jumlah dan judul pada objek yang dibuat dari class tersebut
####dalam fungsi str akan mengembalikan nilai dari judul dan jumlah pada objek tersebut yang kemudian akan
####dirubah menjadi string
##
####2b
####print(R) akan menampikan hasil dari fungsi str yang mana mengembalikan nilai dari judul dan jumlah pada objek tersebut yang kemudian akan
####dirubah menjadi string
##
####2c
####solusi yang saya lakukan adalah dengan menambahkan suatu nilai yang akan dikembalikan oleh fungsi tersebut
####dalam kasus ini nilai jumlah yang tidak tercetak maka, bisa dengan menambahkan suatu nilai pada fungsi str
####atau bisa dengan mencetak nya langsung pada shell dengan mengetikan R.jumlah dimana R disini adalah objek dan
####jumlah adalah nilai yang ingin ditampikan dari objek tersebut


####No3
##class fixedArray(object):
##    def __init__(self, n):
##        self.array = [None] * n
##
##    def __str__(self):
##        return str(self.array)
##    
##    def __getitem__(self, key):
##        return self.array[key]
##    
##    def __setitem__(self, key, value):
##        self.array[key] = value
##
##
##R = fixedArray(5)
##R[0] = "anton"
##R[1] = 23
##R[2] = "magelang"
##R[3] = "informatika"
##R[4] = 2400
##print(R)


####No4
class Simpul():
    def __init__(self, data, taut=None):
        self.data = data
        self.tautan = taut
nim = [2,0,0,1,9,0,1,5,1]
NIM = Simpul(nim[0],Simpul(nim[1],Simpul(nim[2],
            Simpul(nim[3],Simpul(nim[4],Simpul(nim[5],
                Simpul(nim[6],Simpul(nim[7],Simpul(nim[8])))))))))
n = NIM
while n is not None:
    print(n.data)
    n = n.tautan



