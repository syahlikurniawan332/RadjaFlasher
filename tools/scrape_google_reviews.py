from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
from pathlib import Path
import pandas as pd

# =========================
# SETUP BROWSER
# =========================
options = Options()
options.add_argument("--lang=id")
options.add_argument("--disable-notifications")
options.add_argument("--start-maximized")

driver = webdriver.Chrome(options=options)
wait = WebDriverWait(driver, 15)

# =========================
# BUKA GOOGLE MAPS
# =========================
url = "https://www.google.com/maps/place/Radja+Flasher(service+Hp)/@1.2912845,101.1847187,800m/data=!3m2!1e3!4b1!4m6!3m5!1s0x31d37b2e173af7f3:0x25b4df8a506f9233!8m2!3d1.2912791!4d101.1872936!16s%2Fg%2F11m9mpkf52"
driver.get(url)

# tunggu halaman utama
wait.until(EC.presence_of_element_located((By.CLASS_NAME, "DUwDvf")))
time.sleep(2)

# =========================
# AMBIL NAMA TEMPAT
# =========================
try:
    nama_tempat = driver.find_element(By.CLASS_NAME, "DUwDvf").text.strip()
except:
    nama_tempat = "unknown"

# =========================
# KLIK "ULASAN LAINNYA"
# =========================
try:
    btn_review = wait.until(
        EC.element_to_be_clickable((
            By.XPATH,
            "//span[contains(text(),'Ulasan lainnya') or contains(text(),'More reviews')]/ancestor::button"
        ))
    )
    btn_review.click()
    time.sleep(3)
except:
    pass

# =========================
# SCRAPING REVIEW
# =========================
reviews = []
seen = set()

while len(reviews) < 50:
    cards = driver.find_elements(By.CSS_SELECTOR, "div.jftiEf")

    for card in cards:
        try:
            user = card.find_element(By.CLASS_NAME, "d4r55").text.strip()
        except:
            user = "unknown"

        try:
            review_text = card.find_element(By.CLASS_NAME, "wiI7pd").text.strip()
        except:
            continue

        try:
            rating = (
                card.find_element(By.CLASS_NAME, "kvMYJc")
                .get_attribute("aria-label")
                .split()[0]
            )
        except:
            rating = "unknown"
            
        try:
            waktu = card.find_element(By.CLASS_NAME, "rsqaWe").text.strip()
        except:
            waktu = ""
            
        try:
            foto = card.find_element(By.CSS_SELECTOR, "img.NBa7we").get_attribute("src")
        
        except:
            foto = ""

        key = (user, review_text)
        if key in seen:
            continue

        seen.add(key)
        reviews.append({
            "nama_tempat": nama_tempat,
            "foto_user": foto,
            "user": user,
            "rating": rating,
            "waktu": waktu,
            "review": review_text,
        })

        if len(reviews) >= 50:
            break

    # scroll ke review terakhir
    try:
        driver.execute_script(
            "arguments[0].scrollIntoView();",
            cards[-1]
        )
    except:
        break

    time.sleep(2)

# =========================
# SIMPAN KE CSV
# =========================
df = pd.DataFrame(reviews)
output_path = Path(__file__).resolve().parents[1] / "resources" / "data" / "ulasan.csv"
output_path.parent.mkdir(parents=True, exist_ok=True)
df.to_csv(output_path, index=False, encoding="utf-8-sig")

print(f"[INFO] {len(reviews)} ulasan berhasil disimpan ke {output_path}")

driver.quit()
