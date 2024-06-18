import pymongo

myclient = pymongo.MongoClient("mongodb://localhost:27017/")
mydb = myclient["vacaciones"]
mycol = mydb["abril_2021"]

x = mycol.find_one()

print(x["Date"])
