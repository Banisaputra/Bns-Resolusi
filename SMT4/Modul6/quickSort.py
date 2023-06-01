A = [23,13,31,21,89,76,80,91,109]
print("A =",A)
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
