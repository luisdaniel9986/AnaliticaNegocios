import csv
import random

# Función para generar un valor aleatorio entre dos límites
def random_value(min_val, max_val):
    return round(random.uniform(min_val, max_val), 2)

# Función para generar un valor aleatorio 0 o 1
def random_boolean():
    return random.choice([0, 1])

# Función para generar un diagnóstico aleatorio
def random_diagnosis():
    return random.choice(["DIABETES TIPO 1", "DIABETES TIPO 2", "SIN DIABETES"])

# Generar los datos aleatorios y escribirlos en el archivo CSV
csv_file_path = 'D:/Python/Objetivos/obj1diabetes/data/generated_diabetes_data.csv'

with open(csv_file_path, mode='w', newline='') as file:
    fieldnames = ["id", "glucemia_mgdL", "presionArterialSistolica_mmHg", "presionArterialDiastolica_mmHg",
                  "nivelInsulina_uUmL", "indiceMasaCorporal_kgm2", "nivelCetonasUrina_mgdL", "polidipsia",
                  "poliuria", "polifagia", "anticuerpos_betaPancreas", "antecedentesFamiliares", "edad", "diagnostico"]
    writer = csv.DictWriter(file, fieldnames=fieldnames, delimiter=';', quotechar='"', quoting=csv.QUOTE_ALL)

    writer.writeheader()

    for i in range(1, 5001):
        writer.writerow({
            "id": i,
            "glucemia_mgdL": str(random_value(60, 300)),
            "presionArterialSistolica_mmHg": str(random_value(80, 140)),
            "presionArterialDiastolica_mmHg": str(random_value(50, 100)),
            "nivelInsulina_uUmL": str(random_value(1, 40)),
            "indiceMasaCorporal_kgm2": str(random_value(16, 60)),
            "nivelCetonasUrina_mgdL": str(random_value(0, 40)),
            "polidipsia": str(random_boolean()),
            "poliuria": str(random_boolean()),
            "polifagia": str(random_boolean()),
            "anticuerpos_betaPancreas": str(random_boolean()),
            "antecedentesFamiliares": str(random_boolean()),
            "edad": str(random.randint(10, 80)),
            "diagnostico": random_diagnosis()
        })

print(f"Archivo CSV generado en: {csv_file_path}")
