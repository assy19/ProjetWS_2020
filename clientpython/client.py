
from suds.client import Client


wsdl = "http://localhost/diop/mglsi-infos.com/client_python/server.php?wsdl"

client = Client(wsdl)
print(client)

result = client.service.getListUsersoap(1)
#response=client.service
#print(response)
print(result)