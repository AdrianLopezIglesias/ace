print("hola")
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
import time
from faker import Faker
fake = Faker('es_ES')

# options = webdriver.ChromeOptions()
# options.add_argument('ignore-certificate-errors')
# driver = webdriver.Chrome(chrome_options=options)
# driver = webdriver.Chrome()
chrome_options = Options()
chrome_options.add_argument("--window-size=1000,1500")
driver = webdriver.Chrome(chrome_options=chrome_options)

URLS= "http://127.0.0.1:8000"
driver.get(URLS)
driver.find_element_by_xpath('//*[@id="navbarSupportedContent"]/ul/li[6]/a').click()
driver.find_element_by_xpath('//*[@id="modal-open-button"]').click()
time.sleep(1)
driver.find_element_by_xpath('//*[@id="nombre"]').send_keys(fake.name())
driver.find_element_by_xpath('//*[@id="dni"]').send_keys(fake.ean(length=8))
driver.find_element_by_xpath('//*[@id="fecha_nacimiento"]').send_keys(fake.date())
driver.find_element_by_xpath('//*[@id="domicilio"]').send_keys(fake.name())


driver.find_element_by_xpath('//*[@id="telefono_principal"]').send_keys(fake.phone_number())

driver.find_element_by_xpath('//*[@id="telefono_emergencias"]').send_keys(fake.phone_number())

driver.find_element_by_xpath('//*[@id="genero"]').send_keys(fake.prefix())

driver.find_element_by_xpath('//*[@id="crear_paciente"]').click()








# user = driver.find_element_by_id("login_user")
# user.send_keys("jjschettino.gif")
# pas = driver.find_element_by_id("login_pass")
# pas.send_keys(ClearingPass)
# login = driver.find_element_by_class_name("submit_input").click()
# driver.get("https://gestion-clearing.com.ar/fraud/search")
# driver.find_element_by_xpath("/html/body/div[2]/div[1]/div[1]/form/h2[2]").click()
# WSheet.UsedRange
# LastRow = WSheet.UsedRange.Rows(WSheet.UsedRange.Rows.Count).Row
# print(LastRow)
# import math
# col = WSheet.Range("G1:G" + str(LastRow)
# #print(len(col)
# for cell in col:
#     if cell.value == "Verificar" and WSheet.Range("V" + str(cell.Row).Value != "" and WSheet.Range("V" + str(cell.Row).Value != 0:
#         try:
#             print('Cell value: ')
#             print(WSheet.Range("V" + str(cell.Row).Value)
#             ClearingQuery = math.trunc(WSheet.Range("V" + str(cell.Row).Value)
#             driver.find_element_by_id("fraud_list_fraud_person_dni").clear()
#             dni = driver.find_element_by_id("fraud_list_fraud_person_dni")
#             dni.send_keys(ClearingQuery)         
#             driver.find_element_by_xpath("/html/body/div[2]/div[1]/div/form/input[2]").click()
#             print(driver.find_element_by_class_name("fraud_list_table").text)
#             try:
#                 WSheet.Range("AO" + str(cell.Row).Value = driver.find_element_by_class_name("fraud_list_table").text
#             except:
#                 WSheet.Range("AO" + str(cell.Row).Value = "Error al realizar la operaci??n. Comprobar manualmente"
#         except:
#             WSheet.Range("AO" + str(cell.Row).Value = "Error al realizar la operaci??n. Comprobar manualmente"
# driver.close()
# workbook.save()