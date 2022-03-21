def faktorPrima(nilai):
    step = 1
    primaSmtr = []
    while(step<=nilai):
        step+=1
        for i in range(2,nilai+1):
            if nilai % i == 0:
                for j in range(2, i+1):
                    if i%j == 0:
                        if i == 2 or i==j:
                            nilai = nilai // i
                            primaSmtr.append(i)
                        else:
                            break
                break            
    print(primaSmtr)
