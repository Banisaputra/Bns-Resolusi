from tkinter import *
import tkinter.messagebox as MessageBox
import mysql.connector

root = Tk()
root.title('Final Project Praktikum SBD')
root.geometry('700x400')

#database
conn = mysql.connector.connect(user='root', database='nasmoko')
c =conn.cursor()

def submit():
    conn = mysql.connector.connect(user='root', database='nasmoko')
    c =conn.cursor()
    value =(j_mobil.get(), w_mobil.get(), t_mobil.get())
    sql = "INSERT INTO mobil(jenis_mobil, warna_mobil, tipe_mobil)VALUES(%s, %s, %s)"
    c.execute(sql, value)
    conn.commit()
    conn.close()
    j_mobil.delete(0,END)
    w_mobil.delete(0,END)
    t_mobil.delete(0,END)

def query():
    list.delete(0,END)
    conn = mysql.connector.connect(user='root', database='nasmoko')
    c =conn.cursor()
    c.execute("SELECT * FROM mobil")
    records = c.fetchall()
    for record in records:
        print_records = str(record)
        list.insert(list.size()+9, print_records)
    conn.commit()
    conn.close()

def query2():
    list.delete(0,END)
    conn = mysql.connector.connect(user='root', database='nasmoko')
    c =conn.cursor()
    c.execute("SELECT * FROM layanan_service")
    records = c.fetchall()
    print_records =''
    for record in records:
        print_records = str(record)
        list.insert(list.size()+9, print_records)
    conn.commit()
    conn.close()

def edit():
    global editor
    editor = Tk()
    editor.title('Update Record')
    editor.geometry('450x400')

    conn = mysql.connector.connect(user='root', database='nasmoko')
    c =conn.cursor()
    record_data = d_mobil.get()
    c.execute("SELECT * FROM mobil WHERE id_mobil= "+ record_data)
    records = c.fetchall()
    global j_mobil_edit
    global w_mobil_edit
    global t_mobil_edit
    
    d_mobil_edit = Entry(editor, width=50)
    d_mobil_edit.grid(row=0, column=1, pady=15, padx=20)
    j_mobil_edit = Entry(editor, width=50)
    j_mobil_edit.grid(row=1, column=1, pady=15, padx=20)
    w_mobil_edit = Entry(editor, width=50)
    w_mobil_edit.grid(row=2, column=1, pady=15, padx=20)
    t_mobil_edit = Entry(editor, width=50)
    t_mobil_edit.grid(row=3, column=1, pady=15, padx=20)
    
    d_mobil_label_edit = Label(editor, text='ID Mobil')
    d_mobil_label_edit.grid(row=0, column=0)
    j_mobil_label_edit = Label(editor, text='Jenis Mobil')
    j_mobil_label_edit.grid(row=1, column=0)
    w_mobil_label_edit = Label(editor, text='Warna Mobil')
    w_mobil_label_edit.grid(row=2, column=0)
    t_mobil_label_edit = Label(editor, text='Tipe Mobil')
    t_mobil_label_edit.grid(row=3, column=0)

    for record in records:
        d_mobil_edit.insert(0,record[0])
        d_mobil_edit.config(state='readonly')
        j_mobil_edit.insert(0,record[1])
        w_mobil_edit.insert(0,record[2])
        t_mobil_edit.insert(0,record[3])

    submit_btn_edit = Button(editor, text='Save Record Car to Database', command=update)
    submit_btn_edit.grid(row=4, column=0, columnspan=2, pady=5, padx=5, ipadx=100)
    conn.close()
    
def update():
    conn = mysql.connector.connect(user='root', database='nasmoko')
    c = conn.cursor()
    record_id = d_mobil.get()
    value = (j_mobil_edit.get(), w_mobil_edit.get(), t_mobil_edit.get(), record_id)
    sql = """UPDATE mobil SET
            jenis_mobil = %s,
            warna_mobil = %s,
            tipe_mobil = %s
            WHERE id_mobil = %s"""
    c.execute(sql, value)
    records = c.fetchall()
    print_records =''
    for record in records:
        print_records = str(record)
        list.insert(list.size()+1, print_records)
    conn.commit()
    conn.close()
    query()
    editor.destroy()

def delete():
    conn = mysql.connector.connect(user='root', database='nasmoko')
    c =conn.cursor()
    c.execute("DELETE FROM mobil WHERE id_mobil= "+d_mobil.get())
    records = c.fetchall()
    print_records =''
    for record in records:
        print_records = str(record)
        list.insert(list.size()+9, print_records)
    conn.commit()
    conn.close()
    d_mobil.delete(0,END)
    query()

j_mobil = Entry(root, width=50)
j_mobil.grid(row=0, column=1, padx=20)
w_mobil = Entry(root, width=50)
w_mobil.grid(row=1, column=1, padx=20)
t_mobil = Entry(root, width=50)
t_mobil.grid(row=2, column=1, padx=20)
d_mobil = Entry(root, width=50)
d_mobil.grid(row=3, column=1, padx=20)

j_mobil_label = Label(root, text='Jenis Mobil')
j_mobil_label.grid(row=0, column=0)
w_mobil_label = Label(root, text='Warna Mobil')
w_mobil_label.grid(row=1, column=0)
t_mobil_label = Label(root, text='Tipe Mobil')
t_mobil_label.grid(row=2, column=0)
d_mobil_label = Label(root, text='ID Mobil*')
d_mobil_label.grid(row=3, column=0)
note_label = Label(root, text='*Note : Use ID Mobil for Update and Delete Only')
note_label.grid(row=5, column=0, columnspan=2, pady=10, padx=5)

submit_btn = Button(root, text='Add Record Car to Database', command=submit)
submit_btn.grid(row=0, column=3,pady=5, padx=5, ipadx=20)

query_btn1 = Button(root, text='Show Record of Cars', command=query)
query_btn1.grid(row=1, column=3, pady=5, padx=5, ipadx=40)

query_btn2 = Button(root, text='Show Record of Service', command=query2)
query_btn2.grid(row=2, column=3, pady=5, padx=5, ipadx=34)

list = Listbox(root, width=50)
list.grid(row=4,column=1)

query_btn3 = Button(root, text='Update Record of Cars', command=edit)
query_btn3.grid(row=3, column=3, pady=5, padx=5, ipadx=35)

query_btn4 = Button(root, text='Delete Record of Cars', command=delete)
query_btn4.grid(row=4, column=3, pady=5, padx=5, ipadx=37)




conn.commit()

conn.close()

root.mainloop()
