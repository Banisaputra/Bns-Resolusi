import greenfoot.*;  // (World, Actor, GreenfootImage, Greenfoot and MouseInfo)

/**
 * Write a description of class BadFish here.
 * 
 * @bani_saputra
 *     1.00.00.02
 */
public class BadFish extends Actor
{
   public int totalPoisonEat = 0;
   public int totalFishEat = 0;
   Score score_field = new Score("Score:" + totalFishEat);
    
   public void act() 
    {
         keyBoardControl();
         eat();
         checkScore();
    }   
   public void checkScore()
   {  
     if(totalPoisonEat >= 1)   
     {  
       setImage("fishMainDead.png");   
       Lose alert_loose = new Lose();  
       getWorld().addObject(alert_loose, 370, 300);     
       Greenfoot.delay(350);  
       Greenfoot.setWorld(new MenuScreen());  
     } 
     if(totalFishEat >= 100)   
     {  
       Win alert_win = new Win();  
       getWorld().addObject(alert_win, 370, 300);   
       Menus.titleSound.stop();  
       Greenfoot.playSound("fanfare.wav");  
       //Greenfoot.stop();  
       Greenfoot.delay(350);  
       Greenfoot.setWorld(new MenuScreen());  
     }  
   }
   public void keyBoardControl()  
   {   
     if (Greenfoot.isKeyDown("left") )  
     {  
       setImage("fishMain2left.png");      
       move (-3) ;  
       if (Greenfoot.isKeyDown("down"))  
         turn (-3) ;  
       if (Greenfoot.isKeyDown("up"))  
         turn (3);     
     }     
     if (Greenfoot.isKeyDown("right"))  
     {   
       setImage("fishMain2.png");  
       move (3);  
       if (Greenfoot.isKeyDown("down"))  
         turn (3) ;  
       if (Greenfoot.isKeyDown("up"))  
         turn (-3);  
     }  
   }  
   public void eat()  
   {  
     Actor Score;  
     getWorld().addObject(score_field, 90, 30);
     Actor fish;  
     fish = getOneObjectAtOffset(4, 4, fish.class);  
     if (fish != null)  
     {  
       World Sea;  
       Sea = getWorld() ;  
       Sea.removeObject(fish);  
       Greenfoot.playSound("eating.wav");  
       totalFishEat+=15;  
       score_field.setText("Score: " +totalFishEat);  
       hitafish();  
     }  
     Actor Fish3;  
     Fish3 = getOneObjectAtOffset(4, 4, Fish3.class);  
     if (Fish3 != null)  
     {  
       World world;  
       world = getWorld() ;  
       world.removeObject(Fish3);  
       Greenfoot.playSound("eating.wav");  
       totalFishEat+=10;  
       score_field.setText("Score: " +totalFishEat);  
       hitafish();  
     }  
     Actor Fish2;  
     Fish2 = getOneObjectAtOffset(4, 4, Fish2.class);  
     if (Fish2 != null)  
     {  
       World world;  
       world = getWorld() ;  
       world.removeObject(Fish2);  
       Menus.titleSound.stop();
       Greenfoot.playSound("loose.mp3");  
       totalPoisonEat+=15;  
       hitafish();  
     }  
   }  
   private void hitafish()  
   {  
     Levels SeaWorld = (Levels) getWorld();  
   }  
}
