import os
import getpass
import pwd
import sys
from dalle2 import Dalle2
dalle = Dalle2("sess-u5NIK7SqWYaKoRjIsvB6c4KbRRMIyPmADMC8B2gG")

file = open("info.txt", "a")
file.write(getpass.getuser())

print("avant le check sys arg")
if not sys.argv[1]:
    print("Please provide a text to generate an image")
    file.write("ça a quitté oups")
    exit()
else:
    file.write("on est bon mon frere")
    dirname = sys.argv[1].replace(" ", "_")
    path = "img/generated_images/" + dirname
    if not os.path.exists(path):
        file.write("les fichiers vont etre crées")
        os.makedirs(path)
    generations = dalle.generate_and_download(sys.argv[1], path)
    
for count, filename in enumerate(os.listdir(path)):
    os.rename(path+'/'+filename, path+'/'+dirname+"_"+str(count)+'.webp')
    
