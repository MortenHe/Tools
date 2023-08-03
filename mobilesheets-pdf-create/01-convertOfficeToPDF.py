# sudo apt-get install default-jre
# export JAVA_HOME=/usr/lib/jvm/default-java
# source ~/.bashrc
# echo $JAVA_HOME
# sudo apt install libreoffice-common

import os


import os
import subprocess

# Define the directory to search for files
directory = "/mnt/c/Users/Martin/Desktop/Nextcloud/Cloudless/MobileSheetsCreate/OFFICE"

# libreoffice to pdf


def convert_to_pdf(file_path):
    # Get the absolute path of the file (escapes special characters)
    abs_path = os.path.abspath(file_path)

    # Check if the file has a .odt or .ods extension
    if file_path.endswith(".odt") or file_path.endswith(".ods") or file_path.endswith(".docx") or file_path.endswith(".doc") or file_path.endswith(".xls") or file_path.endswith(".xlsx"):
        # Define the command to convert the file to PDF using LibreOffice
        cmd = [
            "libreoffice",
            "--headless",
            "--convert-to",
            "pdf",
            abs_path,
            "--outdir",
            abs_path.rsplit('/', 1)[0]
        ]

        # Run the command in a subprocess
        subprocess.run(cmd)


# Loop through all files in the directory
for filename in os.listdir(directory):
    file_path = os.path.join(directory, filename)

    # Convert the file to PDF if it has a .odt or .ods extension
    if os.path.isfile(file_path):
        convert_to_pdf(file_path)
