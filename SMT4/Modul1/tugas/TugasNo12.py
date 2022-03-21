def tebakAngka():
    import random
    angka = random.randint(1,100)
    percobaan = 1
    print("Permainan tebak angka")
    print("Saya menyimpan sebuah angka bulat antara 1 sampai 100. Coba tebak.")
    while(percobaan<=7):
        tebak = input("Masukkan tebakan ke-"+str(percobaan)+":> ")
        if int(tebak) < angka:
            print("Itu terlalu kecil. Coba lagi.")
        elif int(tebak) > angka:
            print("Itu terlalu besar. Coba lagi.")
        else:
            print("Ya. Anda benar")
            print("Yukkk, main lagi, tuliskan tebakAngka()")
            break
        percobaan += 1
    if (percobaan > 7):
        print("yahh percobaan habis, jawabannya adalah", angka)
        print("Yukkk, main lagi, tuliskan tebakAngka()")
tebakAngka()
