import joblib

def cargar_modelo(ruta_modelo):
    """
    Carga el modelo de árbol de decisiones desde el archivo .pkl.

    :param ruta_modelo: La ruta al archivo .pkl que contiene el modelo.
    :return: El modelo cargado.
    """
    return joblib.load(ruta_modelo)

def hacer_prediccion(modelo, glucemia_mgdL, anticuerpos_betaPancreas):
    """
    Realiza una predicción utilizando el modelo cargado.

    :param modelo: El modelo de árbol de decisiones cargado.
    :param glucemia_mgdL: Valor de glucemia en mg/dL.
    :param anticuerpos_betaPancreas: Valor de anticuerpos beta del páncreas.
    :return: La predicción realizada por el modelo.
    """
    prediccion = modelo.predict([[glucemia_mgdL, anticuerpos_betaPancreas]])
    return prediccion[0]

if __name__ == "__main__":
   
    # Ruta al archivo .pkl que contiene el modelo entrenado
    ruta_modelo = 'modelo_arbol.pkl'

    # Cargar el modelo desde el archivo .pkl
    modelo = cargar_modelo(ruta_modelo)

    # Ejemplo de predicción con nuevos datos
    nueva_glucemia = 80
    nuevos_anticuerpos = 1
    resultado_prediccion = hacer_prediccion(modelo, nueva_glucemia, nuevos_anticuerpos)

    # Imprimir el resultado de la predicción
    print(resultado_prediccion)
