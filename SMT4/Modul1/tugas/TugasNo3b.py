def jumlahHurufKonsonan(kata):
    vokal = "aiueoAIOUE"
    panjang = len(kata)
    bykKonso = 0
    for i in kata:
        if i not in vokal:
            bykKonso += 1
    print(panjang,"Karakter")
    print(bykKonso,"Huruf Konsonan")
