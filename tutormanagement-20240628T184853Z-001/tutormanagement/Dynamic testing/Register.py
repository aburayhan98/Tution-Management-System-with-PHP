from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
import time
driver = webdriver.Chrome()
driver.maximize_window()
# Open the web page
driver.get("http://localhost/tutormanagement/register.php")
time.sleep(5)
name="Md Jabbar"
email="mdjabbar@gmail.com"
phone="01303470930"
password='inputPassword'

namePath='/html/body/div[2]/div/div[1]/div/form/div[1]/div/input'
emailPath="/html/body/div[2]/div/div[1]/div/form/div[2]/div/input"
phonePath="/html/body/div[2]/div/div[1]/div/form/div[3]/div/input"
registerBtnPath='/html/body/div[2]/div/div[1]/div/form/div[6]/button'

driver.find_element(By.XPATH,namePath).send_keys(name)
time.sleep(3)
driver.find_element(By.XPATH,emailPath).send_keys(email)
time.sleep(3)
driver.find_element(By.XPATH,phonePath).send_keys(phone)
time.sleep(3)
driver.find_element(By.ID,"inputPassword").send_keys(password)
time.sleep(2)
district_select = driver.find_element(By.NAME, "district")
select = Select(district_select)
select.select_by_visible_text("Mymensingh")
time.sleep(2)
driver.find_element(By.XPATH,registerBtnPath).click()


time.sleep(25)
driver.close()
