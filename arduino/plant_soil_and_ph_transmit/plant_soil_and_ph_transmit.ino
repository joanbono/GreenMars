

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
#include <nRF24L01.h>
#include <RF24.h>
#include <RF24_config.h>
#include <SPI.h>
RF24 radio(9,10);
 String message; 

float valor_read=A5; //reads PH value
float valor;
float desv2;
float desv;
float pH;
float mV;
void setup(){
  pinMode(valor_read, INPUT);
  Serial.begin(9600);
    radio_start(0x4c);     //call the radio to setup
}

void loop(){
  valor= analogRead(valor_read);
  mV=valor/1000;
  desv2=(2.45-mV);
  desv=desv2/(-0.41);
  pH=7+desv+5;
  Serial.println("pH: ");  Serial.println(pH);
  dht_write(pH,"wph1");//Send soil pH data through the radio frequency transmiter (the number would go from wph1 to wph6 for each cell)
  
    
  int lectura_humedad_tierra = analogRead(A1);
  float humedad_tierra =100 - lectura_humedad_tierra * (100.0 / 1023.0);
  Serial.print("Soil humidity:");                        //Serial print soil humidity
  Serial.println(humedad_tierra);
    dht_write(humedad_tierra,"mois1");//Send soil humidity data through the radio frequency transmiter (the number would go from mois1 to mois6 for each cell)
  
  delay(3000);
}



  /////////////////////////////////////Radio frequency functions///////////////////////



void radio_start(int channel)
{   
  radio.begin();              
  radio.setPALevel(RF24_PA_MAX);
  radio.setChannel(76);
  radio.openWritingPipe(0xF0F0F0F0E1LL);
  radio.enableDynamicPayloads();
  radio.powerUp();
}  
void sensor_write(int sensor, String prefix, int sensor_id)
{                                          
  map(sensor,0,1023,0,1023);
  String sensor_out = prefix + String(analogRead(sensor_id),DEC);
  write_data(sensor_out);
  delay(5000);
}

void dht_write(int sensor, String prefix)
{                                          
  map(sensor,0,1023,0,1023);
  String sensor_out = prefix + sensor;
  write_data(sensor_out);
  delay(5000);
}
void write_data(String data)
{                          
  char outBuffer[32]= "";                            //Create the char 'outBuffer' allowing a max payload of 32 characters
  data.toCharArray(outBuffer, 32);                   //Convert string message to the char array of outBuffer
  radio.write(outBuffer, strlen(outBuffer));         //Transmit outBuffer
  Serial.println(data);                              //Serial print data (debug)
}
