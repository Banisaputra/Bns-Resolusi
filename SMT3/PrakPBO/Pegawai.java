package uas1;

public abstract class Pegawai {
	private String namaPeg;
	public Pegawai(String nama) {
		namaPeg = nama;
	}
	public String namaPegawai() {
		return namaPeg;
	}
	public abstract double gaji();
}
