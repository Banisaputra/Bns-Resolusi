## modulSORT
## Modul5
def swap(A,p,q):
    tmp = A[p]
    A[p] = A[q]
    A[q] = tmp

def cariPosisiYangTerkecil(A, dariSini, sampaiSini):
    posisiYangTerkecil = dariSini           #-> anggap ini yang terkecil
    for i in range(dariSini+1, sampaiSini): #-> cari di sisa list
        if A[i] < A[posisiYangTerkecil]:    #-> kalau menemukan yang lebih kecil,
            posisiYangTerkecil = i          #-> anggapan dirubah
    return posisiYangTerkecil

def bubbleSort(A):
    n = len(A)
    for i in range(n-1):        #-> Lakukan operasi gelembung sebanyak n-1
        for j in range (n-i-1): #-> Dorong elemen terbesar ke ujung kanan
            if A[j] > A[j+1]:   #-> Jika di kiri lebih besar dari di kanannya,
                swap(A,j,j+1)   #-> tukar posisi elemen ke j dengan ke j+1

def insertionSort(A):
    n = len(A)
    for i in range(1, n):
        nilai = A[i]
        pos = i
        while pos > 0 and nilai < A[pos - 1]:   # -> Cari posisi yang tepat
            A[pos] = A[pos - 1]             # dan geser ke kanan terus
            pos = pos - 1           # nilai-nilai yang lebih besar
        A[pos] = nilai      # -> Pada posisi ini tempatkan nilai elemen ke i.

def selectionSort(A):
    n = len(A)
    for i in range(n-1):
        indexKecil = cariPosisiYangTerkecil(A, i, n)
        if indexKecil != i :
            swap(A, i, indexKecil)

## Modul6
def quickSort(A):
    quickSortBantu(A,0,len(A)-1)

def quickSortBantu(A, awal, akhir):
    if awal < akhir:
        titikBelah = partisi(A, awal,akhir)
        quickSortBantu(A, awal,titikBelah - 1)
        quickSortBantu(A, titikBelah + 1, akhir)

def partisi(A, awal,akhir):
    nilaiPivot = A[awal]
    penandaKiri = awal+1
    penandaKanan = akhir
    selesai = False
    while not selesai:
        while penandaKiri <= penandaKanan and \
              A[penandaKiri] <= nilaiPivot:
            penandaKiri = penandaKiri +1
        while A[penandaKanan] >= nilaiPivot and \
              penandaKanan >= penandaKiri:
            penandaKanan = penandaKanan -1
        if penandaKanan < penandaKiri:
            selesai = True
        else:
            temp = A[penandaKiri]
            A[penandaKiri] = A[penandaKanan]
            A[penandaKanan] = temp

    temp = A[awal]
    A[awal] = A[penandaKanan]
    A[penandaKanan] = temp
    return penandaKanan

def margeSort(A):
    if len(A) > 1:
        mid = len(A) // 2
        separuhKiri = A[:mid]
        separuhKanan = A[mid:]
        margeSort(separuhKiri)
        margeSort(separuhKanan)
        i=0;j=0;k=0
        while i<len(separuhKiri) and j<len(separuhKanan):
            if separuhKiri[i] < separuhKanan[j]:
                A[k] = separuhKiri[i]
                i=i+1
            else:
                A[k] = separuhKanan[j]
                j=j+1
            k=k+1

        while i<len(separuhKiri):
            A[k] = separuhKiri[i]
            i=i+1
            k=k+1
        while j<len(separuhKanan):
            A[k] = separuhKanan[j]
            j=j+1
            k=k+1
            

