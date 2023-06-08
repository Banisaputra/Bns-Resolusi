import greenfoot.*;
import java.awt.Color;
import java.applet.*;
import java.awt.Font;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class Score here.
 * 
 * @bani_saputra
 *    1.00.00.09
 */
public class Score extends Actor
{
   Font font1 = new Font ("algerian",Font.BOLD,35);
   public static GreenfootImage Img_field;
   public Score (String text)
    {
        GreenfootImage Img_field = new GreenfootImage(140,50);
        Img_field.getFont();
        Img_field.getColor();
        Img_field.drawString(text, 0, 45);
        setImage(Img_field);
    }
   public void setText(String text)  
   {  
     GreenfootImage img_field = getImage();  
     img_field.clear();  
     img_field.drawString(text, 0, 45);  
   }    
}
