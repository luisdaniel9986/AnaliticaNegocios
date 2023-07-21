from sklearn import tree
import pandas as pd
import pickle

# Creamos el árbol de decisión
arbol = tree.DecisionTreeClassifier()

# Leer datos desde el archivo CSV
data = pd.read_csv('D:/diabetes-dataset.csv', delimiter=';', skiprows=1,
                   names=['glucemia_mgdL', 'presionArterialSistolica_mmHg',
                          'presionArterialDiastolica_mmHg',
                          'nivelInsulina_uUmL', 'indiceMasaCorporal_kgm2',
                          'nivelCetonasUrina_mgdL', 'polidipsia',
                          'poliuria', 'polifagia',
                          'anticuerpos_betaPancreas',
                          'antecedentesFamiliares', 'edad',
                          'diagnostico'])

# Variables predictoras ['glucosa', 'colesterol malo', 'trigliceridos']
X = data[['glucemia_mgdL', 'anticuerpos_betaPancreas']].astype(float).values

# Salida de datos
Y = data['diagnostico']

# ENTRENA
arbol = arbol.fit(X, Y)

# Guardar el modelo en un archivo .pkl
with open('modelo_arbol.pkl', 'wb') as archivo:
    pickle.dump(arbol, archivo)
    

