A = [23,13,31,21,89,76,80,91,109]
print("A =",A)
def quickSort(A, asc=True):
    quickSortBantu(A,0,len(A),asc)

def quickSortBantu(A, awal, akhir, asc=True):
    result = 0
    if awal < akhir:
        titikBelah, result = partisi(A, awal,akhir,asc)
        result += quickSortBantu(A, awal,titikBelah, asc)
        result += quickSortBantu(A, titikBelah + 1, akhir, asc)
    return result

def partisi(A, awal,akhir,asc=True):
    result = 0
    pivot, pidx = median_of_three(A, awal, akhir)
    A[awal], A[pidx] = A[pidx], A[awal]
    i = awal +1
    for j in range(awal+1, akhir,1):
        result += 1
        if (asc and A[j] < pivot) or(not asc and A[j] > pivot):
            A[i],A[j] = A[j],A[i]
            i +=1
    A[awal], A[i-1] = A[i-1], A[awal]
    return i -1, result

def median_of_three(A, awal, akhir):
    med = (awal+akhir-1)//2
    a = A[awal]
    b = A[med]
    c = A[akhir-1]
    if a<= b <=c:
        return b, med
    if c<= b <=a:
        return b, med
    if a<= c <=b:
        return c, akhir-1
    if b<= c <=a:
        return c, akhir-1
    return a, awal

