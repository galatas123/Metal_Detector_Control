#include <Controllino.h>
#include <Wire.h>

#define SENSOR_IN CONTROLLINO_A0
#define SENSOR_OUT CONTROLLINO_A1
#define SENSOR_LOCK CONTROLLINO_A2
#define NOT_AUS_SCHALTER CONTROLLINO_A3
#define SENSOR_METAL_DETECTOR CONTROLLINO_A4
#define MAGNET_IN CONTROLLINO_D0
#define MAGNET_OUT CONTROLLINO_D4
#define MAGNET_LOCK CONTROLLINO_D5
#define DREHKREUZ CONTROLLINO_D3

const int output_pins[4] = {MAGNET_IN, MAGNET_OUT, MAGNET_LOCK, DREHKREUZ};
const int input_pins[5] = {SENSOR_IN, SENSOR_OUT, SENSOR_LOCK};
int requested_pin = -1;

void setup() 
{
  Serial.begin(9600);
  Wire.begin(32);
  Wire.onReceive(receiveEvent); // raspberry change output states
  Wire.onRequest(requestEvent); // rpi input data request event
  pinMode(NOT_AUS_SCHALTER, INPUT);
  pinMode(SENSOR_METAL_DETECTOR, INPUT);
  for (int i = 0; i < 4; i++) {
    pinMode(output_pins[i], OUTPUT);
  }
  for (int i = 0; i < 3; i++) {
    pinMode(input_pins[i], INPUT);
  }
  digitalWrite(output_pins[3], HIGH);
}

void loop() 
{
  delay(1000);
}

void receiveEvent(int byte_number) 
{
  //Serial.println("receive event");
  //Serial.println(total_bytes);
  if (byte_number > 2)
  {
    //Serial.println("req output");
    int endtransmission = Wire.read();
    int output = Wire.read();
    int state = Wire.read(); 
    digitalWrite(output_pins[output], state);
  }
  if (byte_number == 1)
  {
    int input = Wire.read();
    //Serial.println("requested input");
    //Serial.println(output);
    requested_pin = digitalRead(input_pins[input]);
  }
}

void requestEvent(int total_bytes)
{
  if (requested_pin != -1)
  {
    Wire.write(requested_pin);
    requested_pin = -1;
  } 
}
