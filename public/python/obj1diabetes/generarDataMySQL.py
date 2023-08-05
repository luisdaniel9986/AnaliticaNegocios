import os
import pandas as pd
import mysql.connector

# Función para conectar con la base de datos MySQL
def connect_to_mysql():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="password",  # Deja este campo en blanco si no hay contraseña
        database="Minsa"
    )

# Ruta a la carpeta que contiene los archivos CSV
csv_folder_path = 'D:/Python/Objetivos/obj1diabetes/data'

# Lista para almacenar los nombres de los archivos CSV encontrados
csv_files = []

# Obtener la lista de archivos CSV en la carpeta
for file in os.listdir(csv_folder_path):
    if file.endswith(".csv"):
        csv_files.append(file)

# Establecer la conexión con la base de datos
connection = connect_to_mysql()
cursor = connection.cursor()

# Procesar cada archivo CSV y cargar sus datos en la tabla MySQL
for csv_file in csv_files:
    csv_file_path = os.path.join(csv_folder_path, csv_file)

    # Leer el archivo CSV usando pandas y especificar el delimitador como ";"
    df = pd.read_csv(csv_file_path, delimiter=';')

    # Insertar los registros en la tabla MySQL
    for _, row in df.iterrows():
        sql = "INSERT INTO objetivo1Diabetes (glucemia_mgdL, presionArterialSistolica_mmHg, presionArterialDiastolica_mmHg, nivelInsulina_uUmL, indiceMasaCorporal_kgm2, nivelCetonasUrina_mgdL, polidipsia, poliuria, polifagia, anticuerpos_betaPancreas, antecedentesFamiliares, edad, diagnostico) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
        values = (
            row['glucemia_mgdL'],
            row['presionArterialSistolica_mmHg'],
            row['presionArterialDiastolica_mmHg'],
            row['nivelInsulina_uUmL'],
            row['indiceMasaCorporal_kgm2'],
            row['nivelCetonasUrina_mgdL'],
            row['polidipsia'],
            row['poliuria'],
            row['polifagia'],
            row['anticuerpos_betaPancreas'],
            row['antecedentesFamiliares'],
            row['edad'],
            row['diagnostico'],
        )
        cursor.execute(sql, values)

    # Guardar los cambios para cada archivo
    connection.commit()

# Cerrar la conexión
cursor.close()
connection.close()

print("Registros cargados exitosamente en la tabla MySQL.")
