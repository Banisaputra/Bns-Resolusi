import math
def rerata(b):
    total = 0
    panjang = len(b)
    for i in b:
        total += i
    hasil = total / panjang
    return hasil

def variance(data):
    n = len(data)
    rata = sum(data) / n
    deviations = [(x - rata) ** 2 for x in data]
    variance = sum(deviations) / n
    return variance

def stdev(data):
    var = variance(data)
    std_dev = math.sqrt(var)
    return std_dev
