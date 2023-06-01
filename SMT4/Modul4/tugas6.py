def binSe (kumpulan,target):
    low = 0
    high = len(kumpulan) - 1
    while low <=high:
        mid = (high + low) // 2
        if kumpulan [mid] == target:
            return "target berada di index " + str(mid)
            break
        elif target < kumpulan [mid]:
            high = mid -1
        else:
            low = mid + 1
    return "target tidak ada dalam index"
listnya = [16, 27, 38, 49, 55, 78, 67]
target1 = 67
target2 = 6969
print ("\nListnya :", listnya)
print ("Nilai targetnya", target1)
print (binSe(listnya, target1))
print ("\nListnya :", listnya)
print ("Nilai targetnya", target2)
print (binSe(listnya, target2))
