import greenfoot.*;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class fish here.
 * 
 * @Qosim imam 
 *    1.00.00.10
 */
public class fish extends Actor
{
    public void act() 
    {
     move (2) ;  
     if (Greenfoot.getRandomNumber (20) < 10)
     {
        turn (Greenfoot.getRandomNumber (50) - 20) ;
     }
     if (getX () <= 5 || getX() >= getWorld().getWidth () - 5)  
     {  
        turn (180) ;  
     }  
     if (getY () <= 5 || getY() >= getWorld().getHeight () - 5)  
     {  
        turn (180) ;  
     }  
    }    
}
