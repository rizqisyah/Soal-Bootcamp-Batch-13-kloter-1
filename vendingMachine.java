
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
public class vendingMachine {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int jmlUang,totalBelanja;
        Scanner input = new Scanner(System.in);
        System.out.print("Inputkan Uang: ");
        jmlUang = input.nextInt();
        System.out.print("Inputkan total Belanja: ");
        totalBelanja = input.nextInt();
        hitungKembali(totalBelanja,jmlUang);
    }
    static void hitungKembali(int a,int b){
        int jumlah = b - a;
        int kembalian;
        int[]nominal = {50000,20000,10000,5000};
        // for (int i = 0; i < nominal.length; i++) {
        //     if(a>=5000){
        //         if(jumlah/nominal[i]!=0){
        //              System.out.println(jumlah/nominal[i]+" lembar uang Rp"+nominal[i]);
        //          }
        //     }
        //     kembalian=jumlah%nominal[i];
        //     jumlah=kembalian;
        // }
        int i = 0;
        while(i < nominal.length){
            if(a>=5000){
                if(jumlah/nominal[i]!=0){
                     System.out.println(jumlah/nominal[i]+" lembar uang Rp"+nominal[i]);
                 }
            }
            kembalian=jumlah%nominal[i];
            jumlah=kembalian;
            i++;
        }
        if(a!=0){
           System.out.println(jumlah+" Di Sumbangkan");
        }
    }
    
}
