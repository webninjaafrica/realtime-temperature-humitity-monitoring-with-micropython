import network
import urequests as req
from utime import sleep
from machine import Pin
import dht
##written by Kelvin Mwangi Magochi www.webninjaafrica.com E-mail: mwangikelvin278@gmail.com tel: 0111560417
## MIT license..

dht_pin=Pin(14,Pin.IN)
d=dht.DHT11(dht_pin)

a=network.WLAN(network.STA_IF)

try:
  if not a.isconnected():
    print("initiating connection..")
    a.active(True)
    a.connect("AIAP","aiap0212")
    print("networks: ",a.scan())
    while not a.isconnected():
      pass
    print("success! network info: "+str(a.ifconfig()))
except Exception as e:
    print("connection error: ")
    print(e)

while True:
    d.measure()
    temp=d.temperature()
    hum=d.humidity()
    #configure server address
    server_address="http://192.169.0.102" #change this address to match your xammp/web server domain /address
    #end server address
    chip_name="MAGOCHI-GREENHOUSE-1"
    print("Humidity: "+str(hum))
    print("Temperature: "+str(temp))
    strq=server_address+"/IOT/api.php?hum="+str(hum)+"&temp="+str(temp)+"&chip="+str(chip_name)+""
    try:
       p=req.get(strq)
       sleep(2)
       print(p.text)
       p.close()
    except Exception as y:
       print("not queried url")
       print(y)
    sleep(2)
