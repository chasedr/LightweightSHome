#!/usr/bin/python
# -*- coding:utf-8 -*-

import socket
import threading
import thread
import MySQLdb
import time
import struct
import os

#HOST = "192.168.189.128"
#HOST = "172.17.134.240"
HOST = "192.168.254.128"
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
		conn = connectDatabase("localhost","123456","SHomeDB")
		print "addr,funcode,data",addr,funccode,data
		writeData(conn,str(addr),str(funccode),str(data))
	
		self.c.send('OK')
		self.c.close()
		print 'exiting'

def decode(buff):
	#crc
	print "buff's size is:" ,str(len(buff))
	head,addr,repeat,funccode,lux,time,crc,end = struct.unpack("!HHBBHLHH",buff[0:16])
	return addr,funccode,lux

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

def sendCommand(c,addr):
	print "connection and address is" ,c ,addr
	databuff = c.recv(1024)
	remoteSocketBuff[0].send(databuff)

def keepAlive(c,addr):
	print "connection and address is",c,addr
	while (True):
		time.sleep(5)

remoteSocketBuff = []
def listenRemote(c,addr):
	s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
	s.bind((HOST,PORT))
	s.listen(5)
	while(True):
		c,address = s.accept()
		thread.start_new_thread(keepAlive,(c,address,))
		remoteSocketBuff.append(c)

def listenLocal(c,addr):
	s = socket.socket(socket.AF_UNIX,socket.SOCK_STREAM)
	if os.path.exists("/tmp/temp.sock"):
		os.unlink("/tmp/temp.sock")
	s.bind("/tmp/temp.sock")
	s.listen(5)
	while(True):
		c,address = s.accept()
		thread.start_new_thread(sendCommand,(c,address))

def startServer(host,port):
	thread.start_new_thread(listenLocal,(123,123,))
	thread.start_new_thread(listenRemote,(123,123,))
	while(True):
		time.sleep(5)


startServer(HOST,PORT)
#thread1 = ThreadHandle(1,"thread1",1)
#thread1.start()

#conn = connectDatabase("localhost","123456","SHomeDB")
#writeData(conn,str(1),str(2),str(3))
#is_sigint_up = False
#signal.signal(signal.SIGINT,sigint_handler)
