//PH: +5v, gnd,A5
//Soil: +5V, gnd, A1

/**
 pH 7 = 0 V
 pH Acid [8,14] = - mV
 pH Basic [1,6] = + mV
 Calibration 2,45 = 0
 
 Vinegar = 2 V -> Vtotal= 2,45 - 2 = 0,45 V
 
 
 pH = 7 - pH_deviation
 
 We consider: Vinegar (pH 3); water (pH 7)
 
 straight aproximation of ArdupH v0.1 at 25ºC
 				
 					y=(2,45-2)/(-0,41)=Deviation;
 					x= 7 - y  pH
 
 We introduce: y(volts) and get back: x=(pH)

*/

float valor_read=A5; //reads PH value
float valor;
float desv2;
float desv;
float pH;
float mV;
void setup(){
  pinMode(valor_read, INPUT);
  Serial.begin(9600);
}

void loop(){
  valor= analogRead(valor_read);
  mV=valor/1000;
  desv2=(2.45-mV);
  desv=desv2/(-0.41);
  pH=7+desv+5;
  Serial.println("pH: ");  Serial.println(pH);
  
  
    
  int lectura_humedad_tierra = analogRead(A1);
  float humedad_tierra =100 - lectura_humedad_tierra * (100.0 / 1023.0);
  Serial.print("Soil humidity:");                        //Serial print soil humidity
  Serial.println(humedad_tierra);
  
  
  delay(3000);
}
