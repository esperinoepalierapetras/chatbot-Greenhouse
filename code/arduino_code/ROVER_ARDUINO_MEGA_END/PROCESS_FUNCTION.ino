void process_1()

{  
 if (B==1)
 {

 previousMillisA = 0;        
 previousMillisB = 0;
 previousMillisC = 0;       
 previousMillisD = 0;
 previousMillisE = 0;
 timer3();

 }
 if (B==0)
 {
 S1=1;
 S2=1;
 S3=1;
 S4=1;
 S5=1; 
 mm.setResetDefaults(0, 0);
 mm.reset();
 }
}
