void step1()


{
      int POS1 = 0;
      int POS = map(POS1, 0, 180, 180, 0);
      int POS2 = POS-3;
      int SPEED = 10;
      
      myservoL.write(POS1,SPEED,false);  
      myservoR.write(POS2,SPEED,false);
      
}
