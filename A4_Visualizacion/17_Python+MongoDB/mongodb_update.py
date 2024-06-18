from pymongo import MongoClient
import csv
import json


#Se crea un cliente para el servidor de mongodb
client = MongoClient('mongodb://localhost:27017/')

#Se accede a una base de datos
db = client['noticias']

#crear la colección
col = db['megamedia']

#Checar si la colección existe
#print(db.list_collection_names())

file_name = 'noticias_limpias.json'
cont = 0
with open(file_name) as f:
	for line in f:
		j_content = json.loads(line)
		#Agregar un dato a la colección
		myquery = {"id": j_content['id']}
		newvalues = {"$set": {"medio": "Diario de Yucatan"}}
		col.update_one(myquery, newvalues)
		cont = cont+1

f.close()
print("Se actualizaron "+str(cont)+" registros")