from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
import time
driver = webdriver.Chrome()
driver.maximize_window()
# Open the web page
driver.get("http://localhost/tutormanagement/")
time.sleep(10)


searchBtnPath='/html/body/div[1]/div[1]/div/form/button'


district_select = driver.find_element(By.NAME, "city")
select = Select(district_select)
select.select_by_visible_text("Mymensingh")
time.sleep(2)
driver.find_element(By.XPATH,searchBtnPath).click()

time.sleep(10)

district_select = driver.find_element(By.NAME, "city")
select = Select(district_select)
select.select_by_visible_text("Cumilla")
time.sleep(2)
driver.find_element(By.XPATH,searchBtnPath).click()

time.sleep(30)
driver.close()
