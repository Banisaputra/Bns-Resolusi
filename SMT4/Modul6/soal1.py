from mhsTif import *
def margeSort(A):
    if len(A) > 1:
        mid = len(A) // 2
        separuhKiri = A[:mid]
        separuhKanan = A[mid:]
        margeSort(separuhKiri)
        margeSort(separuhKanan)
        i=0;j=0;k=0
        while i<len(separuhKiri) and j<len(separuhKanan):
            if separuhKiri[i].NIM < separuhKanan[j].NIM:
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
            
