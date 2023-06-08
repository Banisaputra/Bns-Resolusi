import greenfoot.*;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class Fish2 here.
 * 
 * @Qosim imam 
 *   1.00.00.07
 */
public class Fish2 extends Actor
{
    /**
     * Act - do whatever the Fish2 wants to do. This method is called whenever
     * the 'Act' or 'Run' button gets pressed in the environment.
     */
    public void act() 
    {
        move (1) ;  
     if (Greenfoot.getRandomNumber (20) < 10)
     {
        turn (Greenfoot.getRandomNumber (50) - 20) ;
     }
     if (getX () <= 5 || getX() >= getWorld().getWidth () - 5)  
     {  
        turn (60) ;  
     }  
     if (getY () <= 5 || getY() >= getWorld().getHeight () - 5)  
     {  
        turn (80) ;  
     }  // Add your action code here.
    }    
}
