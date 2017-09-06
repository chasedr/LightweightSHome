#!/usr/bin/python
#-*- coding:utf-8 -*-

import sys
import socket
import os
import struct
import string

argvlen = len(sys.argv)
addr = ""
lux = ""
if argvlen-1 != 4:
	print "less params"
	sys.exit("ERR")

if sys.argv[1] == "-address":
	addr = sys.argv[2]
else:
	print "first option error."
	sys.exit("ERR")

if sys.argv[3] == "-lux":
	lux = sys.argv[4]
else:
	print "second option error"
	sys.exit("ERR")

addressnum = string.atoi(addr)
luxnum = string.atoi(lux)

client = socket.socket(socket.AF_UNIX,socket.SOCK_STREAM)
client.connect("/tmp/temp.sock")
#client.send("address and lux :"+addr+","+lux)
#buff = struct.pack("!HBLLBBHLLH",0xaaaa,0x01,0x00000000,0x05050505,0x00,0x07,0x0001,0x00000000,0x00000000,0x0000)
buff = struct.pack("!HBLLBBHLLH",0xaaaa,0x01,0x00000000,addressnum,0x00,0x07,luxnum,0x00000000,0x00000000,0x0000)
#buff = struct.pack("!HBLLBBH",0xaaaa,0x01,0x00000000,addressnum,0x00,0x07,luxnum)
client.send(buff);
client.close()

sys.exit("OK")


