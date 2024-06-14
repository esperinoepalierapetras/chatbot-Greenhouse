
 String input;
 int boundLow;
 int boundHigh;
 const char delimiter = ',';

void serial_Read()

{
  if(Serial1.available()>0) 
   {
  input = Serial1.readStringUntil('\n');
    if (input.length() > 0)
       {
       //Serial.println(input);
       
       boundLow = input.indexOf(delimiter);
       Left = input.substring(0, boundLow).toInt();
       
       boundHigh = input.indexOf(delimiter, boundLow+1);
       Right = input.substring(boundLow+1, boundHigh).toInt();

       boundLow = input.indexOf(delimiter, boundHigh+1);
       Fw = input.substring(boundHigh+1, boundLow).toInt();

       boundHigh = input.indexOf(delimiter, boundLow+1);
       Bw = input.substring(boundLow+1, boundHigh).toInt();
 
       B = input.substring(boundHigh+1).toInt();
      
 
   }      
    
  }  
     
 }
