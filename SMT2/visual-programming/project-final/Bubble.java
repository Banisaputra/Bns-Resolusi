import greenfoot.*;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class Bubble here.
 * 
 * @qosim
 *  1.00.00.03
 */
public class Bubble extends Actor
{
    public void act() 
    {
      setLocation(getY() - 5, getX());  
        if (getY() <= 0)  
        {  
          setLocation(getWorld().getHeight() + 20 , Greenfoot.getRandomNumber(600));  
        }  
    }    
}
