
import requests # Lib para enviar la solicitud al servidor
import json # Lib para trabajar con el formato JSON
import platform # Lib para el serial
import os # Lib para el modelo
import datetime # Lib para la fecha y la hora
import subprocess # Lib para el nombre del fabricante y el procesador
import socket # Lib para el nombre del equipo
import psutil # Lib para identificar la RAM
import wmi # Lib para identificar los slot de la RAM

# Encabeza para la información
print ("\n")
print ("Soporte Técnico Integeratic SAS")
print ("Este programa fue desarrollado por el :")
print ("Departamento de Desarrollo de Software y Hardware de Integratic SAS.")
print ("Autores:")
print ("Denyer Bastidas")
print ("Heimdall Rojas\n")
print("-----------------------------------------------------------------------------------------------------------------------") 
print ("                                                 Ficha Técnica                                                        ")
print("-----------------------------------------------------------------------------------------------------------------------") 
emprersa = ("D.A.C.P") # Departamento Administrativo de Contratación Pública
print ("Empresa : ", emprersa)
#********* Técnicos *********
tecnicos = [
    "Heimdall Rojas",
    "Denyer Bastidas",
    "Andrés Agudelo",
    "Michael Asprilla",
    "Steven Gomez",
    "Michael Saavedra",
    "Luis Agredo"
]

print("Lista de Técnicos:")
print("Seleccione el técnico:")
for i, tecnico in enumerate(tecnicos):
    print(f"{i+1}. {tecnico}")

# Pedir al usuario que elija un técnico
indice = int(input("Ingrese el número del técnico deseado: "))

# Verificar la validez del índice ingresado
if indice < 1 or indice > len(tecnicos):
    print("¡Índice inválido!")
else:
    nom_tec = tecnicos[indice - 1]

print("-----------------------------------------------------------------------------------------------------------------------") 
print("Información:")    
print(f"Nombre del Técnico : ", nom_tec)

# Fecha  y hora actual del registro
fecha_actual = datetime.datetime.now().strftime("%d-%m-%Y")
hora_actual = datetime.datetime.now().strftime("%H:%M:%S")
print("Fecha :", fecha_actual + " / " + "Hora : ", hora_actual + "\n")

# Datos adicionales
print("Ejemplo de sedes : Secretaria de Salud Pública - Secretaria de Hacienda - Secretaria de Cultura - N/D")
sede = input("Ingrese la Sede: ")
print("Ejemplo departamento : Administración - Tesoreria - Soporte Técnico - N/D")
departamento = input("Ingrese el Departamento: ")
print("Ejemplo nombre de usuario : Patricia Garcia - María López - Alejandro Rodríguez - N/D")
nom_usuario = input("Ingrese el Nombre del Usuario: ")
print("Ejemplo de activo fijo : Int-8036 - 75941 - 8541-Hacienda - N/D")
activo_fijo = input("Ingrese el Activo Fijo del Equipo: ")
print("Ejemplo de tipo de equipo : Escritorio - Portátil - Servidor")
tipo_equipo = input("Ingrese el Tipo de Equipo: ")
print("Ejemplo de sistemas operativos : Windows 10 - Windows 7 - Linux - N/D")
so = input("Ingrese el Sistema Operativo: ")
print("Ejemplo de componentes adicionale : Disco Mecánico Sata 500 GB - Targeta Grafica 4 GB - Memoria RAM de 16 GB - N/D")
Componentes_add = input("Ingrese componetes adicionales: ")

# Procesos para detectar los datos de computador
# Serial
if platform.system() == "Windows":
    c = os.popen("wmic bios get serialnumber").read()
    V_serial = c.split("\n")[2].strip()
    print("Serial: ", V_serial)

# Modelo    
    a = os.popen("wmic csproduct get name").read()
    V_modelo = a.split("\n")[2].strip()
    print("Modelo: ", V_modelo)
else:
    print("Este código solo funciona en sistemas operativos Windows")

# Fabricante
result = subprocess.run(['wmic', 'csproduct', 'get', 'vendor'], stdout=subprocess.PIPE, stderr=subprocess.PIPE)
fabricante = result.stdout.decode().strip().split("\n")[1]
print("Fabricante: ", fabricante)

# Nombre del equipo
nom_equipo = socket.gethostname()
print("Nombre del Equipo : ", nom_equipo)

# Procesador
result = subprocess.run('wmic cpu get name', stdout=subprocess.PIPE, stderr=subprocess.PIPE, shell=True)
processor_model = result.stdout.strip().splitlines()[2].decode()
# print(f"Modelo de procesador: {processor_model}")
print("Procesador: ",processor_model)

# Memoria RAM
def get_ram_space():
    ram = psutil.virtual_memory()
    total = ram.total / (1024 ** 3)
    return total
ram_capacity = get_ram_space()
formatted_ram_capacity = round(ram_capacity, 1)
print("Memoria RAM: {:.2f} GB".format(get_ram_space()))

# Slot de memoria ram
# Crea una instancia del objeto WMI para acceder a la información del hardware
w = wmi.WMI()
# Obtiene el número total de ranuras de memoria RAM
slots = w.Win32_PhysicalMemoryArray()[0].MemoryDevices
# Imprime el número total de ranuras
print("Ranuras de memoria RAM:", slots)

# IP 
def obtener_direccion_ip():
    # Obtener el nombre del host local
    nombre_host = socket.gethostname()
    # Obtener la dirección IP del host
    direccion_ip = socket.gethostbyname(nombre_host)
    return direccion_ip

# Llamar a la función para obtener la dirección IP
direccion_ip = obtener_direccion_ip()
print("Dirección IP :", direccion_ip) 

# Discos
# Obtener la información del disco
def get_disk_information():
    disks = psutil.disk_partitions(all=True)
    
    total_capacities = []
    
    for disk in disks:
        try:
            disk_usage = psutil.disk_usage(disk.mountpoint)
            total_capacity = convert_size(disk_usage.total)
            total_capacities.append(total_capacity)
        except Exception as e:
            print("Error al obtener información del disco:", str(e))
            
    return total_capacities

def convert_size(size_bytes):
    if size_bytes == 0:
        return "0B"
    size_names = ("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB")
    i = 0
    while size_bytes >= 1024:
        size_bytes /= 1024
        i += 1
    return f"{size_bytes:.2f} {size_names[i]}"

# Obtener la capacidad total de los discos
capacidad = get_disk_information()
print("Capacidad del Disco :", capacidad) 
print("-----------------------------------------------------------------------------------------------------------------------") 
    

clave = input("Ingrese la clave: ")

if clave == "4020":
    print("Clave correcta. Procediendo con el proceso de subida a la base de datos...\n")
    # Aquí va el código para enviar los datos al servidor
    #--------------------------------------------------------------------------------------------------------------------------------
    # Servidor
    url = "https://sys.integratic.com.co/DACP/procesos/proceso_python.php"
    # Local
    # url = "http://localhost/Proyectos_Integratic/sistema-base/python/proceso_python.php"
    #--------------------------------------------------------------------------------------------------------------------------------
    # Datos que quieres enviar
    data = {
    "empresa":emprersa,    
    "nombre": nom_tec,
    "fecha": fecha_actual,
    "hora" : hora_actual,
    "sede": sede,
    "departamento": departamento,
    "nom_usuario": nom_usuario,
    "activo_fijo": activo_fijo,
    "tipo_equipo": tipo_equipo,
    "serial": V_serial,
    "modelo": V_modelo,
    "fabricante": fabricante,
    "nom_equipo" : nom_equipo,
    "processor_model" : processor_model,
    "ram" : formatted_ram_capacity,
    "slots" : slots,
    "ip" : direccion_ip,
    "disco" : capacidad,
    "so" : so,
    "compo" : Componentes_add,
    }
  # Enviar la solicitud POST
    response = requests.post(url, data=data)

    # Imprimir la respuesta del servidor
    print(response.text)

else:
    print("Clave incorrecta. El programa se cerrará.")
    # sys.exit()
    quit()

input('Presione "Enter" para finalizar el registro de la ficha técnica')

