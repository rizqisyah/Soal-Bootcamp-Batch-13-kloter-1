
import java.util.Scanner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author user
 */
public class nilaiUjian {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        String nama;
        int nim,hadir,tugas,uts,uas;
        Scanner input = new Scanner(System.in);
        System.out.print("Inputkan Nama: ");
        nama = input.next();
        System.out.print("Inputkan Nim: ");
        nim = input.nextInt();
        System.out.print("Inputkan Jumlah Hadir: ");
        hadir = input.nextInt();
        System.out.print("Inputkan Tugas: ");
        tugas = input.nextInt();
        System.out.print("Inputkan UTS: ");
        uts = input.nextInt();
        System.out.print("Inputkan UAS: ");
        uas = input.nextInt();
        int totalKuliah = 14;
        double nKehadiran = hadir * 0.1;
        double nTugas = tugas * 0.2;
        double nUts = uts * 0.3;
        double nUas = uas * 0.4;
        double total = nKehadiran + nTugas + nUts + nUas;
      //  double total = 80;
        if(total>=80){
            System.out.println("Nama :"+nama);
            System..println("NIM :"+nim);
            System.out.println("Nilai : A");
        }else if(total > 71 && total < 79){
            System.out.println("Nama :"+nama);
            System.out.println("NIM :"+nim);
            System.out.println("Nilai : B");
        }else if(total > 61 && total < 70){
            System.out.println("Nama :"+nama);
            System.out.println("NIM :"+nim);
            System.out.println("Nilai : C");
        }else if(total > 50 && total < 60){
            System.out.println("Nama :"+nama);
            System.out.println("NIM :"+nim);
            System.out.println("Nilai : D");
        }else if((total < 50)||(hadir == 0)||(tugas ==0)||(uts ==0)||(uas == 0)){
            System.out.println("Nama :"+nama);
            System.out.println("NIM :"+nim);
            System.out.println("Nilai : E");
        }
    }
    
}
