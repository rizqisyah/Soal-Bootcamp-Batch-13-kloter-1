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
public class Parkir {

    /**
     * @param args the command line arguments
     */
    
    public static void main(String[] args) {
        // TODO code application logic here    
        int nilai;
        Scanner input = new Scanner(System.in);
        System.out.print("Inputkan total parkir: ");
        nilai = input.nextInt();
        hitungParkir(nilai);
    }
    static void hitungParkir(int a){
        int n = 2000;
        int tambah = 1000 *(a-3);
        int m = 10000;
        int pertama = n * 3 ;
        int total = pertama + tambah;
        if(a <= 3){
            System.out.println("Biaya ="+n*a );
        }else if(total < 10000){
            System.out.println("Biaya ="+ total);
        }else{    
            System.out.println("Biaya ="+m );
        }
    }
}
