def cetakPrima():
    for i in range(2,1001):
        for j in range(2,1001):
            if i%j == 0:
                if i!=j:
                    break
                else:
                    print(i)
cetakPrima()
