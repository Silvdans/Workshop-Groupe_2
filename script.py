import os
import sys
from time import sleep
from dalle2 import Dalle2
import mysql.connector

def connect_to_maria_db():
    
    mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="root",
        database="workshop"
    )
    return mydb

def add_theme(name):
    mydb = connect_to_maria_db()
    mycursor = mydb.cursor()
    sql = "INSERT INTO theme (name) VALUES (%s)"
    val = (name,)
    mycursor.execute(sql, val)
    mydb.commit()
    print(mycursor.rowcount, "record inserted.")
    
dalle = Dalle2("sess-6HlaOSOWSvZcf9xqmBIAuI4tZCndWZzJmb8nexwj")

file = open("info.txt", "a")
file.write(sys.argv[1])

if not sys.argv[1]:
    print("Please provide a text to generate an image")
    exit()
else:
    dirname = sys.argv[1].replace(" ", "_")
    path = "img/generated_images/" + dirname
    if not os.path.exists(path):
        file.write("les fichiers vont etre crées")
        os.makedirs(path)
    
    file.write('avant generation')
    file.write(sys.argv[1])
    file.write(path)
    generations = dalle.generate_and_download(sys.argv[1], path)
    add_theme(dirname)
    file.write('apres génération')
    
for count, filename in enumerate(os.listdir(path)):
    os.rename(path+'/'+filename, path+'/'+dirname+"_"+str(count)+'.webp')
    
