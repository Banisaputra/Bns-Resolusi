def gambarlahPersegiEmpat(panjang, lebar):
    print("@"*panjang)
    lebar -= 2
    jarak = panjang -2
    while (lebar !=0):
        print("@"+(" "*jarak)+"@")
        lebar -= 1
    print("@"*panjang)
