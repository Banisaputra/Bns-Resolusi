
###latihan 1.1
##a=4
##b=5
##c=a+b
##print('Nilai a =', a)
##print('Nilai b =', b)
##print('Sekarang, c = a + b =', a, '+', b, '=', c)
##print('')
##print('Sudah selesai.')
##
#####latihan 1.2
##print('Kita perlu bicara sebentar...')
##nm = input('Siapa namamu? (ketik di sini)> ')
##print('Selamat belajar,', nm)
##angkaStr = input('Masukkan sebuah angka antara 1 sampai 100 > ')
##a = int(angkaStr)
##kuadratnya = a*a
##print(nm + ', tahukah kamu bahwa', a, 'kuadrat adalah', kuadratnya,'?')
##
###latihan1.3
##def ucapkanSalam():
##    print("Assalamu ’alaikum!")
##
##def sapa(nama):
##    ucapkanSalam() # Ini memanggil fungsi ucapkanSalam() di atas.
##    print('Halo',nama)
##    print('Selamat belajar!')
##
##def kuadratkan(b):
##    h = b*b
##    return h
##
###latihan1.4
##from math import sqrt as akar
##def selesaikanABC(a,b,c):
##    a = float(a) # mengubah jenis integer menjadi float
##    b = float(b)
##    c = float(c)
##    D = b**2 - 4*a*c
##    x1 = (-b + akar(D))/(2*a)
##    x2 = (-b - akar(D))/(2*a)
##    hasil = (x1,x2)
##    return hasil
####
###latihan1.5
##def apakahGenap(x):
##    if (x%2 == 0):
##        return True
##    else:
##        return False
##
###latihan1.6
def tigaAtauLima(x):
    if (x%3==0 and x%5==0):
        print('Bilangan itu adalah kelipatan 3 dan 5 sekaligus')
    elif x%3==0:
        print('Bilangan itu adalah kelipatan 3')
    elif x%5==0:
        print('Bilangan itu adalah kelipatan 5')
    else:
        print('Bilangan itu bukan kelipatan 3 maupun 5')

#latihan1.7
staff = { 'Santi' : 'santi@ums.ac.id', \
          'Jokowi' : 'jokowi@solokab.go.id', \
          'Endang' : 'Endang@yahoo.com',\
          'Sulastri': 'Sulastri3@gmail.com' }

yangDicari = 'Santi'
if yangDicari in staff:
    print('emailnya', yangDicari, 'adalah' , staff[yangDicari])
else :
    print('Tidak ada yang namanya', yangDicari)

#latihan1.8
for i in range(0,10):
    print(i)

#latihan1.9
for i in s:
    print(i)

###latihan1.10
##dd = {'nama':'joko', 'umur':21, 'asal':'surakarta'}
##for kunci in dd:
##    print(kunci,'<---->', dd[kunci])

###latihan1.11
bil = 0
while(bil*bil<200):
    print(bil, bil*bil)
    bil = bil + 1
