import greenfoot.*;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class Crab here.
 * 
 * @Qosim imam 
 * 1.00.00.06
 */
public class Crab extends Actor
{
    public void act() 
    {
      setLocation(getX() - 2, getY());  
      if (getX() <= 0)  
      {  
          setLocation(getWorld().getWidth() +getX() , getY());  
      }  
    }    
}
