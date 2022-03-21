def formatRupiah(angka):
    angka = str(angka)
    sisa = len(angka)%3
    rupiah = "Rp "
    for i in range(len(angka)):
        rupiah += angka[i]
        if (i-sisa+4)%3==0 and i+1!=len(angka):
            rupiah += "."
    print(rupiah)
    
