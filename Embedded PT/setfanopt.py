#!/usr/bin/python
#-*- coding:utf-8 -*-

import sys
import socket
import os
import struct

argvlen = len(sys.argv)
addr = ""
speed = 0x00 

if argvlen-1 != 4:
	print "less params"
	sys.exit("ERR")

if sys.argv[1] == "-address":
	addr = sys.argv[2]
else:
	print "first option error."
	sys.exit("ERR")

if sys.argv[3] == "-speed":
	speed = int(sys.argv[4])
else:
	print "second option error"
	sys.exit("ERR")

client = socket.socket(socket.AF_UNIX,socket.SOCK_STREAM)
client.connect("/tmp/temp.sock")
#client.send("address and speed :"+addr+","+speed)
buff = struct.pack("!HHBBHHH",0XAAAA,0X0001,0X00,0X05,speed,0X0101,0XABAB)
client.send(buff)
client.close()

sys.exit("OK")


