def jumlahHurufVokal(kata):
    vokal = "aiueoAIUEO"
    panjang = len(kata)
    bykVokal = 0
    for i in kata:
        if i in vokal:
            bykVokal += 1
    print(panjang,"Karakter")
    print(bykVokal,"Huruf Vokal")
