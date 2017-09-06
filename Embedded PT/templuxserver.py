#!/usr/bin/python
# -*- coding:utf-8 -*-

import socket
import threading
import MySQLdb
import time
import struct

#HOST = "192.168.189.128"
HOST = "192.168.215.128"
#HOST = "172.17.134.240"
#HOST = "192.168.0.11"
PORT = 60000 

def sigint_handler(signum,frame):
	global is_sigint_up
	is_sigint_up = True
	print "catched interrupt signal"

class ThreadHandle(threading.Thread):
	def __init__(self,threadID,name,c,addr):
		threading.Thread.__init__(self)
		self.threadID = threadID
		self.name = name
		self.c = c
		self.addr = addr
	def run(self):
		print 'address is:' , self.addr
		print 'threadID is:' , self.threadID

		databuff = self.c.recv(1024)
		addr,funccode,data = decode(databuff)
		
		#print addr,funccode,data
		#conn = connectDatabase("localhost","123456","SHomeDB")
		print "addr,funcode,data",addr,funccode,data
		#writeData(conn,str(addr),str(funccode),str(data))
	
		self.c.send('OK')
		self.c.close()
		print 'exiting'

def decode(buff):
	#crc
	print "buff's size is:" ,str(len(buff))
	head,length,addrhigh,addrlow,repeat,funccode = struct.unpack("!HBLLBB",buff[0:13])
	if(funccode == 0x02):
		head,length,addrhigh,addrlow,repeat,funccode,lux,timehigh,timelow,crc = struct.unpack("!HBLLBBHLLH",buff[0:25])
		return (addrhigh<<32)+addrlow,funccode,lux 
	elif(funccode == 0x08):
		head,length,addr,repeat,funccode,infrared,time,crc = struct.unpack("!HBQBBBQH",buff[0:24])
		return addr,funccode,infrared
	print "unpack failed,buff[12]=",str(funccode)
	return 0,0,0
		

def connectDatabase(hostname,passwd,db):
	conn = MySQLdb.connect(hostname,"root",passwd,db)
	return conn

def writeData(conn,addr,funccode,data):
	cursor = conn.cursor()
	conn.ping(True)
	if funccode == '2':
		print "insert into table light;"
		sql = """insert into light(L_Addr,L_Tone,L_Bright)value("""+addr+""",0,"""+data+""")"""
	elif funccode == '1':	
		print "insert into table wind;"
		sql = """insert into wind(W_Addr,W_Speed,W_Hometemp)value("""+addr+""",0,"""+data+""")"""
	try:
		cursor.execute(sql)
		cursor.close()
		conn.commit()
		print "insert database OK"
	except Exception, e:
		conn.rollback()
#		print 'str(Exception:\t)',str(Exception)
#		print 'e.message:\t' ,e.message
#		print "insert database ERROR"
#		time.sleep(5)
		conn.close()

def createThreadHandle(c,addr):
	print 'address is:' ,addr
	databuff = c.recv(1024)
	addr,funccode,data = decode(databuff)
	
	conn = connectDatabase("localhost","123456","SHomeDB")
	writeData(conn,str(addr),str(funccode),str(data))
	
	c.send('OK')
	c.close()

def startServer(host,port):
	s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
	s.bind((host,port))
	s.listen(5)
	print host,port
	threadID = 0
	while(True):
		c, addr = s.accept()
		thread = ThreadHandle(threadID,"ThreadHandle",c,addr)
		thread.start()
		threadID = threadID + 1
#		thread.start_new_thread(createThreadHandle,(c,addr,))


startServer(HOST,PORT)
#thread1 = ThreadHandle(1,"thread1",1)
#thread1.start()

#conn = connectDatabase("localhost","123456","SHomeDB")
#writeData(conn,str(1),str(2),str(3))
#is_sigint_up = False
#signal.signal(signal.SIGINT,sigint_handler)
