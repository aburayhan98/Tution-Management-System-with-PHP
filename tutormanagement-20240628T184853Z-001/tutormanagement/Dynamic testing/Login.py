from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
import time
driver = webdriver.Chrome()
driver.maximize_window()
# Open the web page
driver.get("http://localhost/tutormanagement/login.php")
time.sleep(5)

emailPath="/html/body/div[2]/div/div[1]/div/form/div[1]/div/input"
passwordPath="/html/body/div[2]/div/div[1]/div/form/div[2]/div/input"
loginBtnPath="/html/body/div[2]/div/div[1]/div/form/div[3]/button"


email="abc@gmail.com"
password='inputPassword'
driver.find_element(By.XPATH,emailPath).send_keys(email)
time.sleep(3)
driver.find_element(By.XPATH,passwordPath).send_keys(password)
time.sleep(3)
driver.find_element(By.XPATH,loginBtnPath).click()

time.sleep(10)
email="test3@gmail.com"
password='inputPassword'

driver.find_element(By.XPATH,emailPath).send_keys(email)
time.sleep(3)
driver.find_element(By.XPATH,passwordPath).send_keys(password)
time.sleep(3)
driver.find_element(By.XPATH,loginBtnPath).click()
time.sleep(30)
driver.close()