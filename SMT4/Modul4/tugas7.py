def binSearch(kumpulan, target):
    low = 0
    high = len(kumpulan) - 1
    data = []
    while low != high:
        mid = (high + low) // 2
        if kumpulan[mid] == target:
            break
        elif target < kumpulan[mid]:
            high = mid - 1
        else:
            low = mid + 1
    for i in range(low, high):
        if target == kumpulan[i]:
            data.append(i)
    return data

a = [2,3,5,6,6,6,8,9,9,10,11,12,13,13,14]


