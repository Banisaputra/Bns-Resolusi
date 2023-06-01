A = [23,13,31,21,89,76,80,91,109]
print("A =",A)
def margeSort(A):
    helpMarge(A,0,len(A))
def helpMarge(A,awal,akhir):
    separuhKiri = []
    separuhKanan = []
    if len(A)>1:
        batas = len(A)//2
        for x in A:
            if awal < batas:
                separuhKiri.append(x)
                awal+=1
            else:
                separuhKanan.append(x)
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
              
