import pandas as pd
from prettytable import PrettyTable

def swap(A,B,C):
    temp = A[B]
    A[B] = A[C]
    A[C] = temp

def bubbleSort(X, jdwl):
    n = len(X)
    for i in range(n-1):
        for j in range(n-1-i):
            if X[j][jdwl] > X[j+1][jdwl]:
                swap(X,j,j+1)
    JadwalAsli(X)

def bubbleSort2(X, jdwl):
    n = len(X)
    for i in range(n-1):
        for j in range(n-1-i):
            if X[j][jdwl] < X[j+1][jdwl]:
                swap(X,j,j+1)
    JadwalAsli(X)

def JadwalAsli(list):
    jadwalPertandingan = PrettyTable(['No','Pertandingan', 'Tempat', 'Waktu'])
    for i in data:
        jadwalPertandingan.add_row(i)
    print(jadwalPertandingan)

def PengurutanTempat(daftar):
    print("Pengurutan Tempat Pertandingan! ")
    bubbleSort(daftar, 2)

def PengurutanWaktu1(daftar):
    print("Pengurutan Waktu Pertandingan dari tanggal Awal! ")
    bubbleSort(daftar, 3)
    
def PengurutanWaktu2(daftar):
    print("Pengurutan Waktu Pertandingan dari tanggal akhir! ")
    bubbleSort2(daftar, 3)

lokasi = 'data.xlsx' #isi lokasi file data pertandingan excel
files = pd.ExcelFile(lokasi)
df = files.parse(files.sheet_names[0])
list = df.to_dict()
data = []
for indeks in range(0, len(list['No'])):  #Mengukur panjang kolom 
    kata = ''
    posisi = 0
    for i in list:
        posisi += 1
        kata += str(list[i][indeks])
        if posisi != 4:
            kata += '*'
    data.append(kata.split('*'))

JadwalAsli(data)
PengurutanTempat(data)
PengurutanWaktu1(data)
PengurutanWaktu2(data)

