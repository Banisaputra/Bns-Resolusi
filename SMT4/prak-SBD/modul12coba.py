##import PySimpleGUI as sg
##
##sg.theme('DarkBlue10')
### All the stuff inside your window.
##layout = [  [sg.Text('Nasmoko Authorized Toyota Dealer')],
##            [sg.Text('Enter something on Row 2'), sg.InputText()],
##            [sg.Button('Ok'), sg.Button('Cancel')] ]
##
### Create the Window
##window = sg.Window('Nasmoko Authorized', layout)
### Event Loop to process "events" and get the "values" of the inputs
##while True:
##    event, values = window.read()
##    if event in (None, 'Cancel'):   # if user closes window or clicks cancel
##        break
##    print('You entered ', values[0])
##
##window.close()


import tkinter as tg
main_window = tg.Tk()
def event_tekan():
    label2 = tg.Label(main_window, text="Insert Data finish")
    label2.pack()

label = tg.Label(main_window, text="Nasmoko Authorized Toyota Dealer")
tombol = tg.Button(main_window, text="Insert Data", command = event_tekan)

label.pack()
tombol.pack()
main_window.mainloop()


##
##import PySimpleGUI as sg
##import mysql.connector
##import os
##import sys
##mydb = mysql.connector.connect(user='root', database='nasmoko')
##
##sg.theme('DarkBlue10')
##layout = [[sg.Text('Nasmoko Authorized Toyota Dealer')],
##          [sg.Button('Go')]
##        ]
####layout2 = [[sg.Text('Main Menu of Nasmoko')],
####           [sg.Button('Insert'), sg.Button('Update')],
####           [sg.Button('Show'), sg.Button('Delete')]
####        ]
##window = sg.Window('Nasmoko Authorized', layout, margins=(100, 50))
##
##def insert_data(mydb):
##  jenis_mobil = input("Jenis Mobil : ")
##  warna_mobil = input("Warna Mobil : ")
##  tipe_mobil = input("Tipe Mobil : ")
##  value = (jenis_mobil ,warna_mobil, tipe_mobil)
##  cursor = mydb.cursor()
##  sql = "INSERT INTO mobil(jenis_mobil, warna_mobil, tipe_mobil) VALUES (%s, %s, %s)"
##  cursor.execute(sql, value)
##  mydb.commit()
##  print("{} data berhasil disimpan".format(cursor.rowcount))
##
##  
##while True:
##    event, values = window.read()
##
##    if event == 'Go':
##        insert_data(mydb)
##
##    if event == sg.WIN_CLOSED:
##        break
##
##window.close()











































