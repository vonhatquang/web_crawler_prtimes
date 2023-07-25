from selenium import webdriver
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument("--headless=new")
options.add_argument("--no-sandbox")
options.add_argument("--disable-dev-shm-usage")

driver = webdriver.Chrome("/usr/bin/chromedriver", options=options)

driver.get("https://google.com/")
print(driver.title)
driver.quit()