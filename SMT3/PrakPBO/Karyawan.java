package uas1;

import java.text.DecimalFormat;

public class Karyawan extends Pegawai{
	String jabatan;
	double dividen;
	public Karyawan(String nama) {
		super(nama);
	}
	public String getname() {
		return namaPegawai();
	}
	public double gaji() {
		return dividen + 4500000;
	}
	public double getGaji() {
		return gaji();
	}
	public void setDividen(double dividen) {
		this.dividen = dividen;
	}
	public void setJabatan(String jabatan) {
		this.jabatan = jabatan;
	}

	
	
	public static void main (String[] args) {
		Karyawan pg = new Karyawan("Doni");
		DecimalFormat df = new DecimalFormat ("#,###,##0.-");
		pg.setJabatan("Direktur");
		pg.setDividen(7500000);
		System.out.println("= == = == = == = == =\n"+
				"Nama    : "+ pg.getname()+"\n"+
				"Jabatan : "+ pg.jabatan+"\n"+
				"Gaji    : Rp. "+ df.format(pg.getGaji())+"\n"+
				"Dividen : Rp. "+ df.format(pg.dividen)+"\n"+
				"Total   : Rp. "+ df.format(pg.getGaji()+pg.dividen));
      
	}
}
