from math import sqrt as akar
def selesaikanABC(a,b,c):
    a = float(a) # mengubah jenis integer menjadi float
    b = float(b)
    c = float(c)
    D = b**2 - 4*a*c
    D = float(D)
    x1 = (-b + akar(abs(D)))/(2*a)#abs memberikan nilai absolute
    x2 = (-b - akar(abs(D)))/(2*a)
    hasil = (x1,x2) # tuple yang terdiri dari dua elemen
    return hasil

