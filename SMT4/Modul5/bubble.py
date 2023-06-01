from swap import *
def bubbleSort(A):
    n = len(A)
    for i in range(n-1):        #-> Lakukan operasi gelembung sebanyak n-1
        for j in range (n-i-1): #-> Dorong elemen terbesar ke ujung kanan
            if A[j] > A[j+1]:   #-> Jika di kiri lebih besar dari di kanannya,
                swap(A,j,j+1)   #-> tukar posisi elemen ke j dengan ke j+1

