#1
import math
def LuasPersegi():
    print("The program calculates the area of ​​Square")
    sisi = int(input("input the side length of the square => "))
    luas = sisi**2
    return "the formula = S**2.\nthan square area is = "+str(luas)+" unit area"
def LuasLingkaran():
    from math import pi
    print("The program calculates the area of ​​a Circle")
    r = float(input("Enter the radius of the circle => "))
    luas = (pi*r**2)
    return "the format = phi*r**2.\nthan circle area is = "+format(luas,'.2f')+" unit area"
def LuasSegitigaSamaSisi():
    print("The program calculates the area of ​​an equilateral triangle")
    sisi = float(input("Insert the sides of the triangle => "))
    luas = ((sisi**2)/4)*math.sqrt(3)
    return "the format = ((sisi**2)/4)*root of(3).\nthan equilateral triangle is = "\
           +format(luas,'.2f')+" unit area"
def LuasBelahKetupat():    
    print("The program calculates the area of ​​a rhombus")
    d1 = float(input("input the first diameter (d1) => "))
    d2 = float(input("input the second diameter (d2) => "))
    luas = (d1*d2)/2
    return "the format = (d1*d2)/2.\nthan rhombus area is = "+format(luas,'.2f')+" unit area"

print(LuasPersegi())
print("=== == "*8)
print(LuasLingkaran())
print("=== == "*8)
print(LuasSegitigaSamaSisi())
print("=== == "*8)
print(LuasBelahKetupat())
print("=== == "*8)
