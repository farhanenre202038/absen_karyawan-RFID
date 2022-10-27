#include <SPI.h>
#include <MFRC522.h>

#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

  const char* ssid ="Farhan_Abadi";
  const char* password ="farhanabadi2020";

  const char* host = "192.168.1.12";

#define LED_PIN D8
#define BTN_PIN D1
#define SDA_PIN D4
#define RST_PIN D3

MFRC522 mfrc522(SDA_PIN, RST_PIN);

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  
  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  while(WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }

  Serial.println("Wifi Connected");
  Serial.print("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);

  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID ANDA ke Reader");
  Serial.println();
}

void loop() {
  // put your main code here, to run repeatedly:
  if(!mfrc522.PICC_IsNewCardPresent())
    return;  
  if(!mfrc522.PICC_ReadCardSerial())
    return;
    
    String IDKAR = "";
    for(byte i=0; i<mfrc522.uid.size; i++)
    {
      IDKAR += mfrc522.uid.uidByte[i];
    }
    
    WiFiClient client;
    const int httpPort = 80;
    if(!client.connect(host, httpPort))
    {
      Serial.println("Connection Failed");
      return; 
    }

    String Link = "";
    HTTPClient http;
    Link = "http://192.168.1.12/absen_karyawan/kirimkartu.php?no_kartu=" + IDKAR;
      http.begin(client, Link);

    int httpCode = http.GET();
    String payload = http.getString();
    Serial.println(payload);
    http.end();
    
    digitalWrite(LED_PIN, HIGH);
    delay(100);  
    digitalWrite(LED_PIN, LOW);
    delay(100);      

    delay(2000);
}
